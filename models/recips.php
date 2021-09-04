<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/dbConnect.php');

    class Recip {
        
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
    
    }