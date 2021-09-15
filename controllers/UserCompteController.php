<?php

namespace app\controllers;

require(ROOT."controllers/AbstractController.php");

class userCompte extends Controller{

    /**
     * This method displays the user informations
     *
     * @return void
     */
    public function index(){

        // On envoie les données à la vue index
        $this->render('userCompte');
    }

/**
     * This method displays the user modify compte
     *
     * @return void
     */
    public function userFormModifCompte(){

        // On envoie les données à la vue index
        $this->render('userFormModifCompte');
    }

    /**
     * This method displays the user comments list
     *
     * @return void
     */
    public function userListComment(){

        // On envoie les données à la vue index
        $this->render('userListComment');
    }
}