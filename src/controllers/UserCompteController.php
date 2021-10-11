<?php

namespace App\src\controllers;

use App\src\models\UserManager;
use App\src\models\User;

class userCompte extends AbstractController{

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

    /**
     * This method modify the data's user
     *
     */
    public function userModifyDatas(){
        if(isset($_POST['mofifyDatas'])) 
        {
            if(!empty($_POST['newLogin']) AND !empty($_POST['newFirstname']) AND !empty($_POST['newLastname']) 
            AND !empty($_POST['newEmail']))
            {
                $idUser = $_SESSION['user']['idUser'];
                echo $idUser;
            }
            else
            {
                $error = "<br /><p class = font-weight-bold>**Tous les champs doivent être saisis<p>";
                return $this->render('userFormModifCompte', [
                    'error' => $error,
                ]);
            }
        }
    }
}