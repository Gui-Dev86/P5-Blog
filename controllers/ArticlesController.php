<?php

namespace app\controllers;

require(ROOT."controllers/AbstractController.php");

class Articles extends Controller {

    /**
     * This method displays all articles
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Article"
        //$this->loadModel('Article');

        // On stocke la liste des articles dans $articles
       // $articles = $this->Article->getAll();

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