<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/dbConnect.php');
    require_once(dirname(__FILE__).'/../utils/sendMail.php');


    class User {

        use sendMail;
        
        private $_id;
        private $_lastname;
        private $_firstname;
        private $_email;
        private $_password;
        private $_pdo;
        private $db;

        // méthode magique pour "hydrater"

        public function __construct($id = "", $lastname = "", $firstname = "",$email = "", $password = "")

        {
        $this->_id=$id;
        $this->_lastname=$lastname; 
        $this->_firstname=$firstname;
        $this->_email=$email;
        $this->_password=$password;

        $this->db = Database::getInstance();
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
                $sql = 'INSERT INTO `user` (`lastname`, `email`, `password`, `firstname`, `confirmation_token`) 
                        VALUES (:lastname, :email, :password, :firstname, :confirmation_token);';
                
                $sth = $this->_pdo->prepare($sql);
    
                $token = $this->setToken();
    
                $sth->bindValue(':lastname',$this->_lastname,PDO::PARAM_STR);
                $sth->bindValue(':email',$this->_email,PDO::PARAM_STR);
                $sth->bindValue(':password',$this->_password,PDO::PARAM_STR);
                $sth->bindValue(':firstname',$this->_firstname,PDO::PARAM_STR);
                $sth->bindValue(':confirmation_token',$token,PDO::PARAM_STR);
    
                
                if($sth->execute()){
                    //envoi d'un mail
                    $id = $this->_pdo->lastInsertId();
                    $this->sendMailConfirm($id, $this->_email, $token);
                    return true;
                } else {
                    return false;
                }
                
    
            }
            catch(PDOException $e){
                return false;
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
                        SET `confirmed_at` = NOW()
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
    }