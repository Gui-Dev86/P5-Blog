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
    public function readAllArticles($firstArticle, $articlesParPage){
        $sql = 'SELECT * FROM articles WHERE isActive_art = 1 ORDER BY dateUpdate_art DESC LIMIT :firstArticle, :articlesParPage';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':firstArticle', $firstArticle, PDO::PARAM_INT);
        $query->bindValue(':articlesParPage', $articlesParPage, PDO::PARAM_INT);
        $query->execute();
        $dataArticles = $query->fetchAll();
        return $dataArticles;
    }

    /**
     * Conut the articles number
     *
     * @return void
     */
    public function countAllArticles(){
        $sql = 'SELECT COUNT(*) AS nbArticles FROM articles WHERE isActive_art = 1';
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $articlesCount = $query->fetch(PDO::FETCH_ASSOC);
        return $articlesCount;
    }
    
    /**
     * Read all articles
     *
     * @return void
     */
    public function readArticle($idArt){
        $sql = 'SELECT * FROM articles where id_art = :id_art';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_art', $idArt, PDO::PARAM_INT);
        $query->execute();
        $dataArticles = $query->fetchAll();
        return $dataArticles;
    }

    /**
     * Save new article
     *
     * @return void
     */
    public function newArticle(Article $article){
    $sql = 'INSERT INTO articles (title_art,chapo_art,content_art,autor_art,date_art,dateUpdate_art,image_art,altImage_art,isActive_art,idUser_user)
        VALUES (:title_art,:chapo_art,:content_art,:autor_art,:date_art,:dateUpdate_art,:image_art,:altImage_art,0,:idUser_user)';
        
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('title_art',$user->getTitle_art(), PDO::PARAM_STR);
        $query->bindValue('chapo_art',$user->getChapo_art(), PDO::PARAM_STR);
        $query->bindValue('content_art',$user->getContent_art(), PDO::PARAM_STR);
        $query->bindValue('autor_art',$user->getAutor_art(), PDO::PARAM_STR);
        $query->bindValue('date_art',$user->getDate_art(), PDO::PARAM_STR);
        $query->bindValue('dateUpdate_art',$user->getDateUpdate_art(), PDO::PARAM_STR);
        $query->bindValue('image_art',$user->getImage_art(), PDO::PARAM_STR);
        $query->bindValue('altImage_art',$user->getAltImage_art(), PDO::PARAM_STR);
        $query->bindValue('idUser_user',$user->getIdUser_user(), PDO::PARAM_INT);
        $query->execute();
    }
}