<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/dbConnect.php');

class Recipe {
        
        private $_id;
        private $_ingredient;
        private $_quantity;
        private $_process_comment;
        private $_image;
        private $_type_of_product;
        private $db;
    
    // Méthode magique pour hydrater

    public function __construct($id = "", $ingredient = "", $quantity = "", $process_comment = "", $image ="", $type_of_product = "" )
    {
        {
            $this->_id=$id; 
            $this->_ingredient=$ingredient;
            $this->_quantity=$quantity;
            $this->_process_comment=$process_comment;
            $this->_image=$image;
            $this->_type_of_product=$type_of_product;
            
            $this->db = Database::getInstance();
            }
    }
    public static function findAll(){
        // requête sql
        $sql = "SELECT * FROM `recipe`";
        
        
        
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