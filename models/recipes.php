<?php
    require_once(dirname(__FILE__).'/../config/config.php');
    require_once(dirname(__FILE__).'/../utils/dbConnect.php');

class Recipe {
        
        private $_id;
        private $_name;
        private $_process_comment;
        private $_type_of_product;
        private $_id_user;
        private $_pdo;
    
    // ----------------------------------- METHODE MAGIQUE APPELEE LORS DE L INSTANCIATION DE L OBJET DANS LE CONTROLLEUR. HYDRATE NOTRE OBJET RECIPE

    public function __construct($id = "", $name = "", $process_comment = "", $type_of_product = "", $id_user = "" )
    {
        {
            $this->_id=$id; 
            $this->_name=$name;
            $this->_process_comment=$process_comment;
            $this->_type_of_product=$type_of_product;
            $this->_id_user=$id_user;
            
            $this->_pdo = Database::getInstance();
            }
    }
// ------------------------------------------------ METHODE QUI PERMET DE CREER UNE RECETTE -----------------------------------

    public function create(){
        try{
            $sql = 'INSERT INTO `recipe` (`name`, `process_comment`, `id_type_of_product`, `id_user`) 
                    VALUES (:name, :process_comment, :type_of_product, :id_user);';
            
            $sth = $this->_pdo->prepare($sql);

            $sth->bindValue(':name',$this->_name,PDO::PARAM_STR);
            $sth->bindValue(':process_comment',$this->_process_comment,PDO::PARAM_STR);
            $sth->bindValue(':type_of_product',$this->_type_of_product,PDO::PARAM_STR);
            $sth->bindValue(':id_user',$this->_id_user,PDO::PARAM_INT);
            
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
// ------------------------------------------------- METHODE QUI PERMET DE LISTER TOUT LES RECETTES -------------------------

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

    public static function findOne($id_recipe){
        $pdo = Database::getInstance();

        // requête sql
        $sql = "SELECT * FROM `recipe` WHERE `id` = :id_recipe";
        $sth = $pdo->prepare($sql);
        
        // récupérer les données dans un tableau PHP
        try {
            $sth->bindValue(':id_recipe',$id_recipe,PDO::PARAM_INT);
            $sth->execute();
            if ($sth == true){
                $result = $sth->fetch();
                return $result;
            }
            
        } catch (PDOException $ex) {
            return $ex;
        }
    }
    // -------------------------------- METHODE QUI PERMET DE RECUPERER LES RECETTES D UN USER ------------------------

    public static function getRecipe($id_user){
        
        $pdo = Database::getInstance();

        try{
            $sql = 'SELECT * FROM `recipe` 
                    WHERE `id_user` = :id_user;';
            $sth = $pdo->prepare($sql);

            $sth->bindValue(':id_user',$id_user,PDO::PARAM_INT);
            $sth->execute();
            $recipe = $sth->fetchAll();
            if(!$recipe){
                return array();
            }
            
            return $recipe;
        }
        catch(PDOException $e){
            return $e->getCode();
        }

    }
    // ---------------------------------- METHODE QUI PERMET DE MODIFIER LES RECETTES D UN USER ------------------

    public function updateRecipe($id){

        try{
            $sql = 'UPDATE `recipe` SET `name` = :name, `process_comment` = :process_comment, `id_type_of_product` = :type_of_product
                    WHERE `id` = :id;';
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':name',$this->_name,PDO::PARAM_STR);
            $sth->bindValue(':process_comment',$this->_process_comment,PDO::PARAM_STR);
            $sth->bindValue(':type_of_product',$this->_type_of_product,PDO::PARAM_INT);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            $sth->execute();
            return 3; 
        }
        catch(PDOException $e){
            return $e;
        }

    }
    // ---------------------------------- METHODE QUI PERMET DE SUPPRIMER UNE RECETTE -----------------------------

    public static function delete($id){

        $pdo = Database::getInstance();

        try{
            $sql = 'DELETE FROM `recipe`
                    WHERE `id` = :id;';
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            $sth->execute();
            if($sth->rowCount()==0)
                return 8;
            else
                return 9;
        }
        catch(PDOException $e){
            return $e;
        }

    }




    // ------------------------------------------------- PAGINATION ----------------------------------------------

    /**
     * Méthode qui permet de lister toutes les recettes existants en fonction d'un mot clé et selon pagination
     * 
     * @return array
     */
    public static function getAll($search='', $limit=null, $offset=0, $type){
        
        try{
            if(!is_null($limit)){ // Si une limite est fixée, il faut tout lister
                $sql = 'SELECT * FROM `recipe` 
                WHERE `name` LIKE :search AND `id_type_of_product` = :type
                ORDER BY `id` DESC
                LIMIT :limit OFFSET :offset ;';
            } else {
                $sql = 'SELECT * FROM `recipe` 
                WHERE `name` 
                ORDER BY `id` DESC 
                LIKE :search AND `id_type_of_product` = :type ;';
            }
            $pdo = Database::getInstance();

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search','%'.$search.'%',PDO::PARAM_STR);
            $stmt->bindValue(':type',$type,PDO::PARAM_INT);

            
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
     * Méthode qui permet de compter les recettes
     * 
     * @return int
     */
    public static function count($s, $type){
        $pdo = Database::getInstance();
        try{
            $sql = 'SELECT * FROM `recipe`
                WHERE `name` LIKE :search AND `id_type_of_product` = :type;';

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search','%'.$s.'%',PDO::PARAM_STR);
            $stmt->bindValue(':type',$type,PDO::PARAM_INT);
            $stmt->execute();
            return($stmt->rowCount());
        }
        catch(PDOException $e){
            return 0;
        }
        
    }
}