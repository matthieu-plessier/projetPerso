<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/dbConnect.php');
    require_once(dirname(__FILE__).'/../utils/sendMail.php');


    class User {

        use sendMail;
        
        private $_id;
        private $_lastname;
        private $_firstname;
        private $_mail;
        private $_password;
        private $_status;
        private $_pdo;
        

        ////////////////////////////////////////////////// méthode magique pour "hydrater"

        public function __construct($id = "", $lastname = "", $firstname = "",$mail = "", $password = "", $status = "")

        {
        $this->_id=$id;
        $this->_lastname=$lastname; 
        $this->_firstname=$firstname;
        $this->_mail=$mail;
        $this->_password=$password;
        $this->_status=$status;

        $this->_pdo = Database::getInstance();
        }
        ///////////////////////////////////////////////////// verifie que le mail existe 
        public static function checkDuplicate($email){
            $checkMailSql ="SELECT `email`
                            FROM `user` 
                            WHERE `email`= :email;";
            

            $stmtCheckMailReq = Database::getInstance()->prepare($checkMailSql);
            
            $stmtCheckMailReq->bindValue(':mail',$email,PDO::PARAM_STR);
            try {
                $stmtCheckMailReq->execute();
                return $stmtCheckMailReq->fetchColumn();
            } catch (PDOException $ex) {
                return false;
            }
        }
        public static function findAll(){
            // requête sql
            $sql = "SELECT * FROM `user`";
            
            
            
            // récupérer les données dans un tableau PHP
            try {
                $sth =  Database::getInstance()->query($sql);
                if ($sth == true){
                    $result = $sth->fetchAll();
                    return $result;
                }
                
            } catch (PDOException $ex) {
                return $ex;
            }
            
        
        }
        public function create(){
            try{
                $sql = 'INSERT INTO `user` (`lastname`, `mail`, `password`, `firstname`, `confirmation_token`, `status`, `id_role`) 
                        VALUES (:lastname, :mail, :password, :firstname, :confirmation_token, :status, 1);';
                
                $sth = $this->_pdo->prepare($sql);
    
                $token = $this->setToken();

                $sth->bindValue(':lastname',$this->_lastname,PDO::PARAM_STR);
                $sth->bindValue(':mail',$this->_mail,PDO::PARAM_STR);
                $sth->bindValue(':password',$this->_password,PDO::PARAM_STR);
                $sth->bindValue(':firstname',$this->_firstname,PDO::PARAM_STR);
                $sth->bindValue(':confirmation_token',$token,PDO::PARAM_STR);
                $sth->bindValue(':status',$this->_status,PDO::PARAM_STR);
    
                
                if($sth->execute()){
                    //envoi d'un mail
                    $id = $this->_pdo->lastInsertId();
                    $this->sendMailConfirm($id, $this->_mail, $token);
                    return 5;
                } else {
                    return 1;
                }
            }
            catch(PDOException $e){
                var_dump($e);
                die;
                return 1;
            }
        }
        private function setToken(){
            $length = 60;
            $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
            return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
        }
    
        public static function validateSignUp($id){
    
            
            try{
    
                $pdo = Database::getInstance();
                $sql = 'UPDATE `user` 
                        SET `confirmed_at` = NOW(), `status` = 1
                        WHERE `id` = :id;';
                $sth = $pdo->prepare($sql);
    
                $sth->bindValue(':id',$id,PDO::PARAM_INT);
                if($sth->execute()){
                    return $sth->rowCount(); 
                }
                
            }
            catch(PDOException $e){
                return false;
            }
    
        }

        /**
     * Méthode qui permet de récupérer le profil d'un Utilisateur
     * 
     * @return object
     */
    public static function get($id){
        
        $pdo = Database::getInstance();

        try{
            $sql = 'SELECT * FROM `user` 
                    WHERE `id` = :id;';

            $sth = $pdo->prepare($sql);

            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            if($sth->execute()){
                return($sth->fetch());
            }
            
        }
        catch(PDOException $e){
            return $e;
        }
    }
    //////////////////////////////////////////////////// CONNECTION /////////////////////////////////////////
    public static function getByEmail($email){

        $pdo = Database::getInstance();

        try{
            $sql = 'SELECT * FROM `user` 
                    WHERE `mail` = :mail AND confirmed_at IS NOT NULL';

            $sth = $pdo->prepare($sql);

            $sth->bindValue(':mail',$email);

            if($sth->execute()){
                return($sth->fetch());
            }
            
        }
        catch(PDOException $e){
            return $e;
        }

    }
    ///////////////////////////////////////////////////// PROFIL USER /////////////////////////////////////////
    
    public static function checkUser($id)
    {
        $sql = "SELECT * FROM `user` WHERE `id` = :id;";
        $req =  Database::getInstance()->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    
        try {
            
            if($req) {
                // on return les données récupérées
                
                return $req->fetch(PDO::FETCH_OBJ);//existe
            }
        } catch (PDOException $ex) {
            return 10; // erreur
        }

    }
    ////////////////////////////////////////////////////// MODIF PROFIL ///////////////////////////////////////////

    public function upDate()
    {
        $sql ="UPDATE  `user` 
                SET `lastname`= :lastname, `firstname`= :firstname, `mail`= :email, `password1`= :password1, `password2`= :password2
                WHERE `id` = :id;";

                $req = $this->_pdo->prepare($sql);

                $req->bindValue(':lastname', $this->_lastname, PDO::PARAM_STR);
                $req->bindValue(':firstname', $this->_firstname, PDO::PARAM_STR);               
                $req->bindValue(':email', $this->_mail, PDO::PARAM_STR);
                $req->bindValue(':password1', $this->_password, PDO::PARAM_STR);
                

                $req->bindValue(':id', $this->_id, PDO::PARAM_STR);


        try {
            if ($req->execute())
            // retourne les données récup
            return 003;
        } catch (PDOException $ex) {
            return false;
        }
    }
    ////////////////////////////////////////////////// METHODE QUI PERMET DE SUPPRIMER UN USER /////////////////////////

    public static function delete($id){

        $pdo = Database::getInstance();

        try{
            $sql = 'DELETE FROM `user`
                    WHERE `id` = :id;';
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            $sth->execute();
            if($sth->rowCount()==0)
                return 3;
            else
                return 10;
        }
        catch(PDOException $e){
            return $e->getCode();
        }

    }
    }