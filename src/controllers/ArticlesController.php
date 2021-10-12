<?php

namespace App\src\controllers;

use App\src\models\UserManager;
use App\src\models\ArticleManager;
use App\src\models\User;
use App\src\models\Article;
use App\src\models\Comment;

class Articles extends AbstractController {
    
    private $userManager;
    private $articleManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->articleManager = new ArticleManager();
    }
    /**
     * This method displays all articles
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Article"
        //$this->loadModel('Article');

        // On stocke la liste des articles dans $articles
       // $articles = $this->articleManager->getAll();

        // On envoie les données à la vue index
        $this->render('listArticles');
    }

    /**
     * This method displays an article
     *
     * @return void
     */
    public function readArticle(){
       
        $this->render('article');
    }

    /**
     * This method create an article
     *
     * @return void
     */
    public function createArticle(){
        
        $this->render('createArticle');
    }

    /**
     * This method modify an article
     *
     * @return void
     */
    public function modifyArticle(){
        
        $this->render('modifyArticle');
    }

}