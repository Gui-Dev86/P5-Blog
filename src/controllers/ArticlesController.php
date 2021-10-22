<?php

namespace App\src\controllers;

use App\src\models\UserManager;
use App\src\models\ArticleManager;
use App\src\models\User;
use App\src\models\Article;
use App\src\models\Comment;
use DateTime;

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
    public function pageArticles() {

        //recover the third URL parameter number page or id article
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $paramURL = (int) strip_tags($_SESSION["paramURL"]);
        }
        
        //count the articles number in the database
        $articlesCount = $this->articleManager->countAllArticles();
        $nbArticles = (int) $articlesCount['nbArticles'];
        //number of articles per page
        $articlesParPage = 3;
        //calculate the pages number
        $pages = ceil($nbArticles / $articlesParPage);
        //calculate the first article per page
        $firstArticle = ($paramURL * $articlesParPage) - $articlesParPage;
        
        //recover the datas of all articles in $articles
        $articles = $this->articleManager->readAllArticles($firstArticle, $articlesParPage);
        
        // On envoie les données à la vue listArticles
        $this->render('listArticles', [
            'articles' => compact('articles'),
            'pages' => $pages,
            'numPage' => $paramURL,
        ]);
    }

    /**
     * This method displays an article
     *
     * @return void
     */
    public function readArticle(){

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
        //recover the datas of one article
        $article = $this->articleManager->readArticle($idArt);

        $commentsCount = $this->articleManager->countComments($idArt);
        $nbComments = (int) $commentsCount['nbComments'];
        $commentsParPage = 5;
        $pagesComments = ceil($nbComments / $commentsParPage);
        $firstComment = ($pageURL * $commentsParPage) - $commentsParPage;
        
        //recover the comments for one article
        $comments = $this->articleManager->readComments($idArt, $firstComment, $commentsParPage);

        $this->render('article', [
            'article' => compact('article'),
            'comments' => compact('comments'),
            'pagesComments' => $pagesComments,
            'numPageComments' => $pageURL,
        ]);
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
            'article' => compact('article'),
            'comments' => compact('comments'),
            'pagesComments' => $pagesComments,
            'numPageComments' => $pageURL,
        ]);
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
    * This method create an article
    *
    * @return void
    */
    public function createArticle(){
        if($this->isLogged() == false) {
            header('Location: ' . local);
            exit;
        } else {
            if(isset($_POST['formCreateArticle'])) 
            {
                $date = new DateTime();
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $folder = "C:/wamp64/www/P5_Blog/public/img/upload/".$filename;
                if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$folder));

                $newArticle = new Article();
                $newArticle->setTitle_art(htmlspecialchars($_POST['title']));
                $newArticle->setChapo_art(htmlspecialchars($_POST['chapo']));
                $newArticle->setContent_art(htmlspecialchars($_POST['content']));
                $newArticle->setAutor_art(htmlspecialchars($_SESSION['user']['login']));
                $newArticle->setImage_art(htmlspecialchars($filename));
                $newArticle->setAltImage_art(htmlspecialchars($_POST['altImage']));
                $newArticle->setDate_art($date->format('Y-m-d H:i:s'));
                $newArticle->setDateUpdate_art($date->format('Y-m-d H:i:s'));
                $newArticle->setId_user(htmlspecialchars($_SESSION['user']['idUser']));

                if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_POST['content'])AND isset($_POST['altImage']) 
                AND !empty($_POST['title']) AND !empty($_POST['chapo']) AND !empty($_POST['content']) AND !empty($_POST['altImage']))
                {
                    $titleLength = strlen($_POST['title']);
                    if($titleLength<=255)
                    {
                        $altImageLength = strlen($_POST['altImage']);
                        if($altImageLength<=25)
                        {
                            $this->articleManager->newArticle($newArticle); 
                            $_POST = [];
                            return header('Location: ' . local . 'articles/pageArticles/1');
                        }
                        else
                        {
                            $error = "<br /><p class = font-weight-bold>*Votre description d'image ne doit pas dépasser 25 caractères<p>";
                            return $this->render('createArticle', [
                                'error' => $error,
                            ]);
                        }
                    }
                    else
                    {
                        $error = "<br /><p class = font-weight-bold>*Votre titre ne doit pas dépasser 255 caractères<p>";
                        return $this->render('createArticle', [
                            'error' => $error,
                        ]);
                    }
                }
                else
                {
                    $error = "<br /><p class = font-weight-bold>**Tous les champs doivent être saisis<p>";
                    return $this->render('createArticle', [
                        'title' => $_POST['title'],
                        'chapo' => $_POST['chapo'],
                        'content' => $_POST['content'],
                        'altImage' => $_POST['altImage'],
                        'error' => $error,
                    ]);
                }
            }
            $this->render('createArticle');
        }
    }

    /**
     * This method create or modify a comment
     *
     * @return void
     */
    public function createModifyComment(){

        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $idArt = (int) strip_tags($_SESSION["paramURL"]);
        }

        if(isset($_SESSION['idCommentPage']) && !empty($_SESSION['idCommentPage']))
        {
            $idCom = (int) strip_tags($_SESSION['idCommentPage']);
        }

        if(isset($_POST['formCreateComment'])) 
        {
            if(isset($_POST['commentContent']) AND !empty($_POST['commentContent']))
            {
            $dateComment = new DateTime();
            $newComment = new Comment();
            $newComment->setContent_com(htmlspecialchars($_POST['commentContent']));
            $newComment->setAutor_com(htmlspecialchars($_SESSION['user']['login']));
            $newComment->setDate_com($dateComment->format('Y-m-d H:i:s'));
            $newComment->setDateUpdate_com($dateComment->format('Y-m-d H:i:s'));
            $newComment->setId_user(htmlspecialchars($_SESSION['user']['idUser']));
            $newComment->setId_art(htmlspecialchars($idArt));
                //with the com ID in the url call function modif
                if(isset($_SESSION['idCommentPage']) && !empty($_SESSION['idCommentPage'])) 
                {
                    
                    if($_SESSION['user']['role'] == 0) {
                        $this->articleManager->updateCommentUser($newComment, $idCom); 
                        $_POST = [];
                        unset($_SESSION['idCommentPage']);
                        $_SESSION['valide'] = "<br /><p class = font-weight-bold>*Votre modification a bien été prise en compte, elle sera soumise au plus vite à l'un des administrateurs<p>";
                        return header('Location: ' . local . 'articles/readArticle/'.$idArt.'/1#listComments');
                    }
                    else
                    {
                        $this->articleManager->updateCommentAdmin($newComment, $idCom); 
                        $_POST = [];
                        unset($_SESSION['idCommentPage']);
                        return header('Location: ' . local . 'articles/readArticle/'.$idArt.'/1#listComments');
                    }
                }
                //or create a new comment
                elseif(!isset($_SESSION['idCommentPage']) && empty($_SESSION['idCommentPage'])) 
                {
                    if($_SESSION['user']['role'] == 0) {
                        $this->articleManager->newCommentUser($newComment); 
                        $_POST = [];
                        $_SESSION['valide'] = "<br /><p class = font-weight-bold>*Votre commentaire a bien été pris en compte, il sera soumis au plus vite à l'un des administrateurs<p>";
                        return header('Location: ' . local . 'articles/readArticle/'.$idArt.'/1#listComments');
                    }
                    //for the admin the comment is immediatly validate
                    else
                    {
                        $this->articleManager->newCommentAdmin($newComment); 
                        $_POST = [];
                        return header('Location: ' . local . 'articles/readArticle/'.$idArt.'/1#listComments');
                    }
                }
            }
            else
            { 
                $_SESSION['error'] = "<br /><p class = font-weight-bold>**Vous n'avez pas saisi de commentaire<p>";
                return header('Location: ' . local . 'articles/readArticle/'.$idArt.'/1#listComments');
            }
        }  
     }

     /**
     * This method display the comment to modify
     *
     * @return void
     */
    public function readModifyComment() {

        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $idArt = (int) strip_tags($_SESSION["paramURL"]);
        }
        
        if(isset($_SESSION['idCommentPage']) && !empty($_SESSION['idCommentPage']))
        {
            $idCom = (int) strip_tags($_SESSION['idCommentPage']);
        }
        
        $comment = $this->articleManager->readComment($idCom);
        $_SESSION['comment'] = $comment;
        return header('Location: ' . local . 'articles/readArticle/'.$idArt. '/1/' .$idCom.'#ancreNewComment');
    }
  
    /**
     * This method "delete" a comment, the comment is hide and always in the database
     *
     * @return void
     */
    public function deleteComment(){
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $idArt = (int) strip_tags($_SESSION["paramURL"]);
        }

        if(isset($_SESSION['idCommentPage']) && !empty($_SESSION['idCommentPage']))
        {
            $idCom = (int) strip_tags($_SESSION['idCommentPage']);
        }

        $comment = $this->articleManager->deleteComment($idCom);
        unset($_SESSION['idCommentPage']);
        return header('Location: ' . local . 'articles/readArticle/'.$idArt. '/1/' .$idCom.'#ancreNewComment');
    }


    /**
     * This method modify an article
     *
     * @return void
     */
    public function modifyArticle(){
        if($this->isLogged() == false) {
            header('Location: ' . local);
            exit;
        } else {
            $this->render('modifyArticle');
        }
    }
    
}