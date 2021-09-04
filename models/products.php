<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/dbConnect.php');

    class Product {
        
        private $_id;
        private $_type_of_product;
        private $_product;
        private $_image;
        private $_quantity;
        private $_comment;
        private $_id_user;
        private $_id_type_of_product;
        private $db;
    
    // Méthode magique pour hydrater

    public function __construct($id = "", $type_of_product = "", $product = "", $_image = "", $quantity = "", $comment = "", $_d_user = "", $id_type_of_product = "")
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