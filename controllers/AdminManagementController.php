<?php

namespace app\controllers;

require(ROOT."controllers/AbstractController.php");

class adminManagement extends Controller{

    /**
     * This method displays the admin dashboard
     *
     * @return void
     */
    public function index(){

        // On envoie les données à la vue index
        $this->render('adminManagement');
    }

    /**
     * This method displays the articles list
     *
     * @return void
     */
    public function listAllArticles(){

        // On envoie les données à la vue index
        $this->render('listAllArticles');
    }

    /**
     * This method displays the comments list
     *
     * @return void
     */
    public function listAllComments(){

        // On envoie les données à la vue index
        $this->render('listAllComments');
    }

    /**
     * This method displays the members list
     *
     * @return void
     */
    public function listAllMembers(){

        // On envoie les données à la vue index
        $this->render('listAllMembers');
    }
}