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
            if(isset($_GET['p']) && !empty($_GET['p'])) {
                $params = explode('/', $_GET['p']);
                //recover the third URL parameter number page
                $paramURL = $params[2];
            }
        
            //count the articles number in the database
            $articlesCount = $this->articleManager->countAllArticlesAdmin();
            $nbArticlesAdmin = (int) $articlesCount['nbArticles'];
            //number of articles per page
            $articlesParPage = 5;
            //calculate the pages number
            $pages = ceil($nbArticlesAdmin / $articlesParPage);
            //calculate the first article per page
            $firstArticle = ($paramURL * $articlesParPage) - $articlesParPage;
            
            //recover the datas of all articles in $articles
            $articles = $this->articleManager->readAllArticlesAdmin($firstArticle, $articlesParPage);
            // On envoie les données à la vue index
            $this->render('adminListAllArticles', [
                'articles' => $articles,
                'pages' => $pages,
                'numPage' => $paramURL,
            ]);
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
            if(isset($_GET['p']) && !empty($_GET['p'])) {
                $params = explode('/', $_GET['p']);
                //recover the third URL parameter number page
                $paramURL = $params[2];
            }
        
        //count the comments number in the database
        $commentsCount = $this->articleManager->countAllCommentsAdmin();
        $nbCommentsAdmin = (int) $commentsCount['nbCommentsAdmin'];
        //number of articles per page
        $commentsParPage = 5;
        //calculate the pages number
        $pages = ceil($nbCommentsAdmin / $commentsParPage);
        //calculate the first comment per page
        $firstComment = ($paramURL * $commentsParPage) - $commentsParPage;
        
        //recover the datas of all comments in $comments
        $comments = $this->articleManager->readAllCommentsAdmin($firstComment, $commentsParPage);
        
            // On envoie les données à la vue index
            $this->render('adminListAllComments', [
                'comments' => $comments,
                'pages' => $pages,
                'numPage' => $paramURL,
            ]);
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
            if(isset($_GET['p']) && !empty($_GET['p'])) {
                $params = explode('/', $_GET['p']);
                //recover the third URL parameter number page
                $paramURL = $params[2];
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
                'users' => $users,
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
            if(isset($_GET['p']) && !empty($_GET['p'])) {
                $params = explode('/', $_GET['p']);
                //recover the third URL parameter user id
                $idUser = $params[2];
            }
        //recover the datas for one user
        $user = $this->userManager->readUser($idUser);
        
        // On envoie les données à la vue index
        $this->render('adminModifyUser', [
            'idUser' => $idUser,
            'user' => $user,
        ]);
        }
    }

/**
    * This method displays the admin page to valid a comment
    *
    * @return void
    */
    public function articleListComments(){

        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third param in the URL for the id article
            $idArt = $params[2];
            //recover the fourth param in the URL for the comment page
            $pageURL = $params[3];
            //recover the fifth param in the URL for the id comment
            $idCom = $params[4];
        }

        //recover the datas of one article
        $article = $this->articleManager->readArticle($idArt);

        $commentsCount = $this->articleManager->countAllComments($idArt);
        $nbComments = (int) $commentsCount['nbComments'];
        $commentsParPage = 5;
        $pagesComments = ceil($nbComments / $commentsParPage);
        $firstComment = ($pageURL * $commentsParPage) - $commentsParPage;
        
        //recover the comments for one article
        $comments = $this->articleManager->readAllComments($idArt, $firstComment, $commentsParPage);

        $this->render('validComment', [
            'idCom' => $idCom,
            'article' => $article,
            'comments' => $comments,
            'pages' => $pagesComments,
            'numPage' => $pageURL,
        ]);
    }

    /**
     * This method pass the user in admin
     *
     * @return void
     */
    public function activeAdmin(){ 
        
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third URL parameter user id
            $idUser = $params[2];
        }
        if(isset($_POST["adminUpgradeUser"]))
        {
            if($idUser == 1)
            {
                //recover the datas for one user
                $user = $this->userManager->readUser($idUser);

                $message = 'Le rôle du compte administrateur principal ne peut pas être modifié.';
                $this->render('adminModifyUser', [
                    'message' => $message,
                ]);
            }
            else
            {                
                //Upgrade the user statute
                $this->userManager->upUserStatute($idUser);
               
                //recover the datas for one user
                $user = $this->userManager->readUser($idUser);
                
                // On envoie les données à la vue index
                $this->render('adminModifyUser', [
                    'idUser' => $idUser,
                    'user' => $user,
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

        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third URL parameter user id
            $idUser = $params[2];
        }
        if(isset($_POST["adminDowngroundUser"]))
        {
            if($idUser == 1) 
            {
                //recover the datas for one user
                $user = $this->userManager->readUser($idUser);

                $message = 'Le rôle du compte administrateur principal ne peut pas être modifié.';
                $this->render('adminModifyUser', [
                    'user' => $user,
                    'message' => $message,
                ]);
            }
            else
            {   
                //downgrade the user statute
                $this->userManager->downUserStatute($idUser);
                ;
                
                //recover the datas for one user
                $user = $this->userManager->readUser($idUser);
                
                // On envoie les données à la vue index
                $this->render('adminModifyUser', [
                    'idUser' => $idUser,
                    'user' => $user,
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
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third URL parameter user id
            $idUser = $params[2];
        }
        if(isset($_POST["adminActiveCompte"]))
        {
            //active the user compte
            $this->userManager->adminActiveCompte($idUser);
            
            
            //recover the datas for one user
            $user = $this->userManager->readUser($idUser);
            
            // On envoie les données à la vue index
            $this->render('adminModifyUser', [
                'idUser' => $idUser,
                'user' => $user,
            ]);

        }
    }

    /**
     * This method desactive the user compte
     *
     * @return void
     */
    public function desactiveCompte(){
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third URL parameter user id
            $idUser = $params[2];
        }
        if(isset($_POST["adminDesactiveCompte"]))
        {
            if($idUser == 1 && $_SESSION['user']['idUser'] != 1) 
            {
                //recover the datas for one user
                $user = $this->userManager->readUser($idUser);

                $message = 'Le compte administrateur principal ne peut pas être modifié.';
                $this->render('adminModifyUser', [
                    'user' => $user,
                    'message' => $message,
                ]);
            }
            else
            {
                //desactive the user compte
                $this->userManager->adminDesactiveCompte($idUser);
                
                //recover the datas for one user
                $user = $this->userManager->readUser($idUser);
                
                // On envoie les données à la vue index
                $this->render('adminModifyUser', [
                    'idUser' => $idUser,
                    'user' => $user,
                ]);
            }
        }
    }

    /**
    * This method validate the comment
    *
    * @return void
    */
    public function validateComment(){
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third URL parameter com id
            $idCom = $params[2];
        }
       
        $this->articleManager->adminValidateComment($idCom);
        
        // On envoie les données à la vue index
        return header('Location: ' . local . 'adminManagement/adminListAllComments/1');
    }

    /**
    * This method refuse the comment
    *
    * @return void
    */
    public function refuseComment(){
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third URL parameter com id
            $idCom = $params[2];
        }
       
        $this->articleManager->adminRefuseComment($idCom);
        
        // On envoie les données à la vue index
        return header('Location: ' . local . 'adminManagement/adminListAllComments/1');
    }

    /**
    * This method initialise the comment to change the validate/refuse
    *
    * @return void
    */
    public function initialiseComment(){
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third URL parameter com id
            $idCom = $params[2];
        }
       
        $this->articleManager->adminInitialiseComment($idCom);
        
        // On envoie les données à la vue index
        return header('Location: ' . local . 'adminManagement/adminListAllComments/1');
    }

    /**
     * This method active an article
     *
     * @return void
     */
    public function activeArticle(){
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third URL parameter art id
            $idArt = $params[2];
        }
       
        $this->articleManager->adminShowArticle($idArt);
        
        // On envoie les données à la vue index
        return header('Location: ' . local . 'adminManagement/adminListAllArticles/1');
    }

    /**
     * This method desactive an article
     *
     * @return void
     */
    public function desactiveArticle(){
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third URL parameter art id
            $idArt = $params[2];
        }
       
        $this->articleManager->adminHideArticle($idArt);
        
        // On envoie les données à la vue index
        return header('Location: ' . local . 'adminManagement/adminListAllArticles/1');
    }
    
}