<?php

namespace App\src\controllers;

use App\src\models\UserManager;
use App\src\models\ArticleManager;
use App\src\models\User;
use App\src\models\Article;
use App\src\models\Comment;

use DateTime;

class adminManagement extends AbstractController {

    private $userManager;
    private $articleManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->articleManager = new ArticleManager();
    }

    /**
     * This method displays the admin dashboard
     *
     * @return void
     */
    public function index(){
        if($this->isLogged() == false OR $this->isAdmin() == false) {
            header('Location: ' . local);
            exit;
        } else {
        // On envoie les données à la vue index
            $this->render('adminManagement');
        }
    }

    /**
     * This method displays the articles list
     *
     * @return void
     */
    public function adminListAllArticles(){
        if($this->isLogged() == false OR $this->isAdmin() == false) {
            header('Location: ' . local);
            exit;
        } else {
        // On envoie les données à la vue index
            $this->render('adminListAllArticles');
        }
    }

    /**
     * This method displays the comments list
     *
     * @return void
     */
    public function adminListAllComments(){
        if($this->isLogged() == false OR $this->isAdmin() == false) {
            header('Location: ' . local);
            exit;
        } else {
            // On envoie les données à la vue index
            $this->render('adminListAllComments');
        }
    }

    /**
     * This method displays the members list
     *
     * @return void
     */
    public function adminListAllMembers(){
        if($this->isLogged() == false OR $this->isAdmin() == false) {
            header('Location: ' . local);
            exit;
        } else {
        //recover the third URL parameter number page
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
        
        //count the members number in the database
        $usersCount = $this->userManager->countAllUsers();
        $nbUsers = (int) $usersCount['nbUsers'];
        //number of articles per page
        $usersParPage = 5;
        //calculate the pages number
        $pages = ceil($nbUsers / $usersParPage);
        //calculate the first user per page
        $firstUser = ($paramURL * $usersParPage) - $usersParPage;
        
        //recover the datas of all users in $users
        $users = $this->userManager->readAllUsers($firstUser, $usersParPage);
        
            // On envoie les données à la vue index
            $this->render('adminListAllMembers', [
                'users' => compact('users'),
                'pages' => $pages,
                'numPage' => $paramURL,
            ]);
        }
    }

    /**
     * This method displays the modify user page
     *
     * @return void
     */
    public function adminModifyUser(){
        if($this->isLogged() == false OR $this->isAdmin() == false) {
            header('Location: ' . local);
            exit;
        } else {
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
        //recover the datas for one user
        $user = $this->userManager->readUser($paramURL);
        
        // On envoie les données à la vue index
        $this->render('adminModifyUser', [
            'user' => compact('user'),
        ]);
        }
    }

    /**
     * This method pass the user in admin
     *
     * @return void
     */
    public function activeAdmin(){ 
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
        if(isset($_POST["adminUpgradeUser"]))
        {
            if($paramURL == 1)
            {
                //recover the datas for one user
                $user = $this->userManager->readUser($paramURL);

                $message = '<br /><p class = "text-center font-weight-bold mb-5">Le rôle du compte administrateur principal ne peut pas être modifié.<p>';
                $this->render('adminModifyUser', [
                    'user' => compact('user'),
                    'message' => $message,
                ]);
            }
            else
            {                
                $updateUser = new User();
                $updateUser->setRole_user(0);
                $dataUser = $this->userManager->readUser($paramURL);
                $this->createSession($dataUser);
                //Upgrade the user statute
                $this->userManager->upUserStatute($paramURL);
               
                //recover the datas for one user
                $user = $this->userManager->readUser($paramURL);
                
                // On envoie les données à la vue index
                $this->render('adminModifyUser', [
                    'user' => compact('user'),
                ]);
            }
        }
    }

    /**
     * This method pass the admin in user
     *
     * @return void
     */
    public function activeUser(){ 
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
        if(isset($_POST["adminDowngroundUser"]))
        {
            if($paramURL == 1) 
            {
                //recover the datas for one user
                $user = $this->userManager->readUser($paramURL);

                $message = '<br /><p class = "text-center font-weight-bold mb-5">Le rôle du compte administrateur principal ne peut pas être modifié.<p>';
                $this->render('adminModifyUser', [
                    'user' => compact('user'),
                    'message' => $message,
                ]);
            }
            else
            {   
                $updateUser = new User();
                $updateUser->setRole_user(1);
                $dataUser = $this->userManager->readUser($paramURL);
                $this->createSession($dataUser);
                //downgrade the user statute
                $this->userManager->downUserStatute($paramURL);
                ;
                
                //recover the datas for one user
                $user = $this->userManager->readUser($paramURL);
                
                // On envoie les données à la vue index
                $this->render('adminModifyUser', [
                    'user' => compact('user'),
                ]);
            }
        }
    }

    /**
     * This method active the user compte
     *
     * @return void
     */
    public function activeCompte(){
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
        if(isset($_POST["adminActiveCompte"]))
        {
            $updateUser = new User();
            $updateUser->setIsActiveAdmin_user(0);
            $dataUser = $this->userManager->readUser($paramURL);

            $this->createSession($dataUser);
            //active the user compte
            $this->userManager->adminActiveCompte($paramURL);
            
            
            //recover the datas for one user
            $user = $this->userManager->readUser($paramURL);
            
            // On envoie les données à la vue index
            $this->render('adminModifyUser', [
                'user' => compact('user'),
            ]);

        }
    }

    /**
     * This method desactive the user compte
     *
     * @return void
     */
    public function desactiveCompte(){
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
        if(isset($_POST["adminDesactiveCompte"]))
        {
            if($paramURL == 1 && $_SESSION['user']['idUser'] != 1) 
            {
                //recover the datas for one user
                $user = $this->userManager->readUser($paramURL);

                $message = '<br /><p class = "text-center font-weight-bold mb-5">Le compte administrateur principal ne peut pas être modifié.<p>';
                $this->render('adminModifyUser', [
                    'user' => compact('user'),
                    'message' => $message,
                ]);
            }
            else
            {
                $updateUser = new User();
                $updateUser->setIsActiveAdmin_user(1);
                $dataUser = $this->userManager->readUser($paramURL);
                $this->createSession($dataUser);
                //desactive the user compte
                $this->userManager->adminDesactiveCompte($paramURL);
                
                //recover the datas for one user
                $user = $this->userManager->readUser($paramURL);
                
                // On envoie les données à la vue index
                $this->render('adminModifyUser', [
                    'user' => compact('user'),
                ]);
            }
        }
    }

}