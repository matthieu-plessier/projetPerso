<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/dbConnect.php');

    class User {
        
        private $_id;
        private $_lastname;
        private $_firstname;
        private $_nickname;
        private $_email;
        private $_birthdate;
        private $_password;

        private $db;

        // méthode magique pour "hydrater"

        public function __construct($id = "", $lastname = "", $firstname = "", $nickname = "",$email = "", $birthdate = "", $password = "")

        {
        $this->_id=$id;
        $this->_lastname=$lastname; 
        $this->_firstname=$firstname;
        $this->_nickname=$nickname;
        $this->_email=$email;
        $this->_birthdate=$birthdate;
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
    }