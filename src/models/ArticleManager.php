<?php

namespace App\src\models;

use PDO;

/**
 * ArticleManager for articles and comments 
 */
class ArticleManager extends AbstractManager {

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "articleManager";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    /**
     * Read all articles
     *
     * @return void
     */
    public function readAllArticles(){
        $sql = 'SELECT * FROM articles ORDER BY dateUpdate_art DESC';
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $dataArticles = $query->fetchAll();
        return $dataArticles;
    }
}