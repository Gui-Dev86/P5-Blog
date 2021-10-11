<?php

namespace App\src\models;

use PDO;

/**
 * UserManager for Users 
 */
class UserManager extends AbstractManager {

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "userManager";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }
}