<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/dbConnect.php');

    class Ingredient {
        
        private $_id;
        private $_quantity;
        private $_ingredient;
        private $_id_recipe;
        private $_pdo;
    
    // Méthode magique pour hydrater

    public function __construct($id = "", $quantity = "",$ingredient = "",$id_recipe = "")
    {
        {
            $this->_id=$id; 
            $this->_quantity=$quantity;
            $this->_ingredient=$ingredient;
            
            $this->_id_recipe=$id_recipe;
            
            
            $this->_pdo = Database::getInstance();
            }
    }

    public function create(){
        try{
            $sql = 'INSERT INTO `ingredients` (`quantity`, `ingredient`, `id_recipe`) 
                    VALUES (:quantity, :ingredient, :id_recipe);';
            
            $sth = $this->_pdo->prepare($sql);

            $sth->bindValue(':quantity',$this->_quantity,PDO::PARAM_STR);
            $sth->bindValue(':ingredient',$this->_ingredient,PDO::PARAM_STR);
            $sth->bindValue(':id_recipe',$this->_id_recipe,PDO::PARAM_INT);
            
            if($sth->execute()){
                return 17;
            } else {
                return 1;
            }
        }
        catch(PDOException $e){
            return 1;
        }
    }

    public static function findAll(){
        // requête sql
        $sql = "SELECT * FROM `recipe` INNER JOIN `ingredients` ON `recipe`.id = `ingredients`.`id_recipe`";
        
        
        
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
        public static function get($id){
        
        $pdo = Database::getInstance();

        try{
            $sql = 'SELECT * FROM `ingredients` 
                    WHERE `id_recipe` = :id;';

            $sth = $pdo->prepare($sql);

            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            if($sth->execute()){
                return($sth->fetchAll());
            }
            
        }
        catch(PDOException $e){
            return $e;
        }
    }  
    }