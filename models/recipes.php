<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/dbConnect.php');

class Recipe {
        
        private $_id;
        private $_name;
        private $_process_comment;
        private $_type_of_product;
        private $_pdo;
    
    // Méthode magique pour hydrater

    public function __construct($id = "", $name = "", $process_comment = "", $type_of_product = "" )
    {
        {
            $this->_id=$id; 
            $this->_name=$name;
            $this->_process_comment=$process_comment;
            $this->_type_of_product=$type_of_product;
            
            $this->_pdo = Database::getInstance();
            }
    }

    public function create(){
        try{
            $sql = 'INSERT INTO `recipe` (`name`, `process_comment`, `id_type_of_product`) 
                    VALUES (:name, :process_comment, :type_of_product);';
            
            $sth = $this->_pdo->prepare($sql);

            $sth->bindValue(':name',$this->_name,PDO::PARAM_STR);
            $sth->bindValue(':process_comment',$this->_process_comment,PDO::PARAM_STR);
            $sth->bindValue(':type_of_product',$this->_type_of_product,PDO::PARAM_STR);
            
            if($sth->execute()){
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

    public static function findAll(){
        // requête sql
        $sql = "SELECT * FROM `recipe` ORDER BY `id` DESC";
        
        
        
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
    ///////////////////////////////////////////// PAGINATION /////////////////////////////////

    /**
     * Méthode qui permet de lister toutes les recettes existants en fonction d'un mot clé et selon pagination
     * 
     * @return array
     */
    public static function getAll($search='', $limit=null, $offset=0){
        
        try{
            if(!is_null($limit)){ // Si une limite est fixée, il faut tout lister
                $sql = 'SELECT * FROM `recipe` 
                WHERE `name` LIKE :search 
                ORDER BY `id` DESC
                LIMIT :limit OFFSET :offset ;';
            } else {
                $sql = 'SELECT * FROM `recipe` 
                WHERE `name` 
                ORDER BY `id` DESC 
                LIKE :search ;';
            }
            $pdo = Database::getInstance();

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search','%'.$search.'%',PDO::PARAM_STR);
            
            if(!is_null($limit)){
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            }
            
            $stmt->execute();
            return($stmt->fetchAll());
        }
        catch (PDOException $e){
            return false;
        }
    }   
    /**
     * Méthode qui permet de compter les patients
     * 
     * @return int
     */
    public static function count($s){
        $pdo = Database::getInstance();
        try{
            $sql = 'SELECT * FROM `recipe`
                WHERE `name` LIKE :search;';

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search','%'.$s.'%',PDO::PARAM_STR);
            $stmt->execute();
            return($stmt->rowCount());
        }
        catch(PDOException $e){
            return 0;
        }
        
    }
}