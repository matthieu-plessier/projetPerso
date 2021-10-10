<?php
// Inclusion du fichier config
require_once dirname(__FILE__).'/../config/config.php';
// SINGLETON

// Création de la base de données
class Database{

    private static $_pdo;

    // Méthodes de création de l'instance
    public static function getInstance()
    {
        try {
            // On test si l'instance est unique
            if(is_null(self::$_pdo)){
                self::$_pdo = new PDO(DSN,LOGIN, PASSWORD); //Connection avec la PDO
                self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Active le Catch des erreurs
                self::$_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);//Defini la méthode de retour fetch

            }
            return self::$_pdo;
        } catch (PDOException $ex) {
            echo sprintf('Probleme de connexion avec l\'erreur', $ex->getMessage());

        }
    }
    
}