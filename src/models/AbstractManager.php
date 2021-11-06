<?php

namespace App\src\models;

use PDO;

abstract class AbstractManager {

    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;

    /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    public function getConnection(){
        
        require_once ROOT."config/database.php";
        
        // On supprime la connexion précédente
        $this->_connexion = null;

        // On essaie de se connecter à la base
        try {
            $this->_connexion = new PDO(DB_DSN, DB_USER, DB_PASS, DB_OPTIONS);
            $this->_connexion->exec("SET NAMES UTF8");
        } catch(PDOException $exception) {
            print_r("Erreur de connexion : " . $exception->getMessage());
        }
    }   
}