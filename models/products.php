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

    public function __construct($id = "", $type_of_product = "", $product = "", $image = "", $quantity = "", $comment = "", $id_user = "", $id_type_of_product = "")
    {
        {
            $this->_id=$id; 
            $this->_type_of_product=$type_of_product;
            $this->_product=$product;
            $this->_image=$image;
            $this->_quantity=$quantity;
            $this->_comment=$comment;
            $this->_id_user=$id_user;
            $this->_id_type_of_product=$id_type_of_product;

            $this->db = Database::getInstance();
            }
    }
    
    }