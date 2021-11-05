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
            //recover the third URL parameter number page
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
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
            //recover the third URL parameter number page
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
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
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
        //recover the datas for one user
        $user = $this->userManager->readUser($paramURL);
        
        // On envoie les données à la vue index
        $this->render('adminModifyUser', [
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

        //recover the fourth param in the URL for the id article
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $idArt = (int) strip_tags($_SESSION["paramURL"]);
        }
        //recover the fourth param in the URL for the comment page
        if(isset($_SESSION["commentPage"]) && !empty($_SESSION["commentPage"]))
        {
            $pageURL = (int) strip_tags($_SESSION['commentPage']);
        }

        //recover the fifth param in the URL for the id comment
        if(isset($_SESSION["idCommentPage"]) && !empty($_SESSION["idCommentPage"]))
        {
            $idCom = (int) strip_tags($_SESSION['idCommentPage']);
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

                $message = 'Le rôle du compte administrateur principal ne peut pas être modifié.';
                $this->render('adminModifyUser', [
                    'user' => $user,
                    'message' => $message,
                ]);
            }
            else
            {                
                //Upgrade the user statute
                $this->userManager->upUserStatute($paramURL);
               
                //recover the datas for one user
                $user = $this->userManager->readUser($paramURL);
                
                // On envoie les données à la vue index
                $this->render('adminModifyUser', [
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

                $message = 'Le rôle du compte administrateur principal ne peut pas être modifié.';
                $this->render('adminModifyUser', [
                    'user' => $user,
                    'message' => $message,
                ]);
            }
            else
            {   
                //downgrade the user statute
                $this->userManager->downUserStatute($paramURL);
                ;
                
                //recover the datas for one user
                $user = $this->userManager->readUser($paramURL);
                
                // On envoie les données à la vue index
                $this->render('adminModifyUser', [
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
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
        if(isset($_POST["adminActiveCompte"]))
        {
            //active the user compte
            $this->userManager->adminActiveCompte($paramURL);
            
            
            //recover the datas for one user
            $user = $this->userManager->readUser($paramURL);
            
            // On envoie les données à la vue index
            $this->render('adminModifyUser', [
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

                $message = 'Le compte administrateur principal ne peut pas être modifié.';
                $this->render('adminModifyUser', [
                    'user' => $user,
                    'message' => $message,
                ]);
            }
            else
            {
                //desactive the user compte
                $this->userManager->adminDesactiveCompte($paramURL);
                
                //recover the datas for one user
                $user = $this->userManager->readUser($paramURL);
                
                // On envoie les données à la vue index
                $this->render('adminModifyUser', [
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
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
       
        $this->articleManager->adminValidateComment($paramURL);
        
        // On envoie les données à la vue index
        return header('Location: ' . local . 'adminManagement/adminListAllComments/1');
    }

    /**
    * This method refuse the comment
    *
    * @return void
    */
    public function refuseComment(){
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
       
        $this->articleManager->adminRefuseComment($paramURL);
        
        // On envoie les données à la vue index
        return header('Location: ' . local . 'adminManagement/adminListAllComments/1');
    }

    /**
    * This method initialise the comment to change the validate/refuse
    *
    * @return void
    */
    public function initialiseComment(){
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
       
        $this->articleManager->adminInitialiseComment($paramURL);
        
        // On envoie les données à la vue index
        return header('Location: ' . local . 'adminManagement/adminListAllComments/1');
    }

    /**
     * This method active an article
     *
     * @return void
     */
    public function activeArticle(){
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
       
        $this->articleManager->adminShowArticle($paramURL);
        
        // On envoie les données à la vue index
        return header('Location: ' . local . 'adminManagement/adminListAllArticles/1');
    }

    /**
     * This method desactive an article
     *
     * @return void
     */
    public function desactiveArticle(){
        //recover the third URL parameter user id
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
       
        $this->articleManager->adminHideArticle($paramURL);
        
        // On envoie les données à la vue index
        return header('Location: ' . local . 'adminManagement/adminListAllArticles/1');
    }
    
}