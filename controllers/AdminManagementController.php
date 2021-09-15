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
    public function adminListAllArticles(){

        // On envoie les données à la vue index
        $this->render('adminListAllArticles');
    }

    /**
     * This method displays the comments list
     *
     * @return void
     */
    public function adminListAllComments(){

        // On envoie les données à la vue index
        $this->render('adminListAllComments');
    }

    /**
     * This method displays the members list
     *
     * @return void
     */
    public function adminListAllMembers(){

        // On envoie les données à la vue index
        $this->render('adminListAllMembers');
    }
}