<?php

namespace App\src\models;

use PDO;

abstract class AbstractManager {
    
    private static $pdo = null;

    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;

    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id;

    /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    public function getConnection(){
        require_once(ROOT."config/database.php");
        /*try {
            if (self::$pdo === null) {
                self::$pdo = new PDO(DB_DSN, DB_USER, DB_PASS, DB_OPTIONS);
                self::$pdo->exec('SET NAMES UTF8');
                return self::$pdo;
            }
        } catch (PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }*/
        
        // On supprime la connexion précédente
        $this->_connexion = null;

        // On essaie de se connecter à la base
        try {
            $this->_connexion = new PDO(DB_DSN, DB_USER, DB_PASS, DB_OPTIONS);
            $this->_connexion->exec("SET NAMES UTF8");
        } catch(PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }   
}