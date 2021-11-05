<?php

namespace App\src\controllers;

use App\src\models\UserManager;
use App\src\models\ArticleManager;
use App\src\models\User;
use App\src\models\Article;
use App\src\models\Comment;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use DateTime;

class Articles extends AbstractController {
    
    private $userManager;
    private $articleManager;
    private $twig;
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
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
        }
        //count the articles number in the database
        $articlesCount = $this->articleManager->countAllArticles();
        $nbArticles = (int) $articlesCount['nbArticles'];
        //number of articles per page
        $articlesParPage = 3;
        //calculate the pages number
        $pages = ceil($nbArticles / $articlesParPage);
        //calculate the first article per page
        $firstArticle = ($params[2] * $articlesParPage) - $articlesParPage;
        
        //recover the datas of all articles in $articles
        $articles = $this->articleManager->readAllArticles($firstArticle, $articlesParPage);
       
        // On envoie les données à la vue listArticles
        $this->render('listArticles', [
            'articles' => $articles,
            'pages' => $pages,
            'numPage' => $params[2],
        ]);
    }

    /**
     * This method displays an article
     *
     * @return void
     */
    public function readArticle(){
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third param in the URL for the id article
            $idArt = $params[2];
            //recover the fourth param in the URL for the comment page
            $pageURL = $params[3];
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
        $valide='';
        $error='';
    
        $this->render('article', [
            'valide' => $valide,
            'error' => $error,
            'article' => $article,
            'comments' => $comments,
            'pagesComments' => $pagesComments,
            'numPageComments' => $pageURL,
        ]);
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
                if(isset($_FILES["uploadfile"]["name"]) && !empty($_FILES["uploadfile"]["name"])) {
                    $filename = $_FILES["uploadfile"]["name"];
                    $tempname = $_FILES["uploadfile"]["tmp_name"];
                    $folder = "C:/wamp64/www/P5_Blog/public/img/upload/".$filename;
                    if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$folder));
                }

                if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_POST['content'])AND isset($_POST['altImage']) 
                AND !empty($_POST['title']) AND !empty($_POST['chapo']) AND !empty($_POST['content']) AND !empty($_POST['altImage']))
                {
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

                    $titleLength = strlen($_POST['title']);
                    if($titleLength<=255)
                    {
                        $altImageLength = strlen($_POST['altImage']);
                        if($altImageLength<=25)
                        {
                            if($_FILES["uploadfile"]["name"] != "")
                            {
                                $this->articleManager->newArticle($newArticle); 
                                $_POST = [];
                                return header('Location: ' . local . 'articles/pageArticles/1');
                            }
                            else
                            {
                                $error = "<br /><p class = font-weight-bold>*Vous n'avez pas sélectionné d'image<p>";
                                return $this->render('createArticle', [
                                    'error' => $error,
                                ]);
                            }
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
     * This method display the page to add a comment
     *
     * @return void
     */
    public function createComment() {
        if($this->isLogged() == false) {
            header('Location: ' . local);
            exit;
        } else {
            if(isset($_GET['p']) && !empty($_GET['p'])) {
                $params = explode('/', $_GET['p']);
            }
            //recover the third param in the URL for the id article
            $idArt = $params[2];
            
            $article = $this->articleManager->readArticle($idArt);
            $this->render('createComment', [
                'idArt' => $idArt,
            ]);
        }
    }

    /**
     * This method create a new comment
     *
     * @return void
     */
    public function addComment(){
        if($this->isLogged() == false) {
            header('Location: ' . local);
            exit;
        } else {
            if(isset($_GET['p']) && !empty($_GET['p'])) {
                $params = explode('/', $_GET['p']);
            }
            //recover the third param in the URL for the id article
            $idArt = $params[2];

            if(isset($_POST['formCreateComment'])) 
            {
                if(!empty($_POST['commentContent']))
                {
                    
                $dateComment = new DateTime();
                $newComment = new Comment();
                $newComment->setContent_com(htmlspecialchars($_POST['commentContent']));
                $newComment->setAutor_com(htmlspecialchars($_SESSION['user']['login']));
                $newComment->setDate_com($dateComment->format('Y-m-d H:i:s'));
                $newComment->setDateUpdate_com($dateComment->format('Y-m-d H:i:s'));
                $newComment->setId_user(htmlspecialchars($_SESSION['user']['idUser']));
                $newComment->setId_art(htmlspecialchars($idArt));
                    
                    if($_SESSION['user']['role'] == 0) {
                        $this->articleManager->newCommentUser($newComment); 
                        $_POST = [];
                        define('valide', $valide);
                        return header('Location: ' . local . 'articles/createComment/'.$idArt.'/1');
                    }
                    //for the admin the comment is immediatly validate
                    else
                    {
                        $this->articleManager->newCommentAdmin($newComment); 
                        $_POST = [];
                        define('valide', $valide);
                        return header('Location: ' . local . 'articles/createComment/'.$idArt.'/1');
                    }
                }
                else
                { 
                    $error = "**Vous n'avez pas saisi de commentaire";
                    $this->render('createComment', [
                        'error' => $error,
                    ]);
                }
            }  
        }
    }

     /**
     * This method display the comment to modify
     *
     * @return void
     */
    public function readModifyComment() {
        if($this->isLogged() == false) {
            header('Location: ' . local);
            exit;
        } else {
            if(isset($_GET['p']) && !empty($_GET['p'])) {
                $params = explode('/', $_GET['p']);
            }
            //recover the third param in the URL for the id article
            $idArt = $params[2];
        
            $idCom = $params[4];
            
            $comment = $this->articleManager->readComment($idCom);
            $article = $this->articleManager->readArticle($idArt);
            $this->render('modifyComment', [
                'comment' => $comment,
                'idArt' => $idArt,
            ]);
        }
    }
  
    /**
     * This method modify the comment
     *
     * @return void
     */
    public function modifyComment() {
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $params = explode('/', $_GET['p']);
            //recover the third param in the URL for the id article
            $idArt = $params[2];
            //recover the fifth param in the URL for the id comment
            $idCom = $params[4];
        }

        if(isset($_POST['formModifyComment'])) 
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
                
                if($_SESSION['user']['role'] == 0) {
                    $this->articleManager->updateCommentUser($newComment, $idCom); 
                    $_POST = [];
                    $valide = "*Votre modification a bien été prise en compte, elle sera soumise au plus vite à l'un des administrateurs";
                    $this->render('modifyComment', [
                        'valide' => $valide,
                        'idArt' => $idArt,
                    ]);
                }
                else
                {
                    $this->articleManager->updateCommentAdmin($newComment, $idCom); 
                    $_POST = [];
                    $valide = "*Votre modification a bien été prise en compte";
                    $this->render('modifyComment', [
                        'valide' => $valide,
                        'idArt' => $idArt,
                    ]);
                }
            }
            else
            { 
                $error = "**Vous n'avez pas saisi de commentaire";
                $this->render('modifyComment', [
                    'error' => $error,
                    'idArt' => $idArt,
                ]);
            }
        }
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
     * This method display the page to modify an article
     *
     * @return void
     */
    public function modifyArticle(){
        if($this->isLogged() == false) {
            header('Location: ' . local);
            exit;
        } else {
            //recover the fourth param in the URL for the id article
            if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
            {
                $idArt = (int) strip_tags($_SESSION["paramURL"]);
            }
            //recover the datas of one article
            $article = $this->articleManager->readArticle($idArt);
            $this->render('modifyArticle', [
                'article' => $article,
            ]);
        }
    }

    /**
     * This method modify the article content
     *
     * @return void
     */
    public function modifyArticleContent(){
        
        if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
        {
            $idArt = (int) strip_tags($_SESSION["paramURL"]);
        }
        
        if(isset($_POST['formModifyArticle'])) 
        {   
            $date = new DateTime();
            if(isset($_FILES["uploadfile"]["name"]) && !empty($_FILES["uploadfile"]["name"])) {
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $folder = "C:/wamp64/www/P5_Blog/public/img/upload/".$filename;
            
            if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$folder));
            }
            //recover the datas of one article
            $article = $this->articleManager->readArticle($idArt);

            $date = new DateTime();
            $newArticle = new Article();
            $newArticle->setTitle_art(htmlspecialchars($_POST['title']));
            $newArticle->setChapo_art(htmlspecialchars($_POST['chapo']));
            $newArticle->setContent_art(htmlspecialchars($_POST['content']));
            if(isset($filename)) {
                $newArticle->setImage_art(htmlspecialchars($filename));
            }
            else
            {
                $newArticle->setImage_art(htmlspecialchars($article[0]['image_art']));
            }
            $newArticle->setAltImage_art(htmlspecialchars($_POST['altImage']));
            $newArticle->setDateUpdate_art($date->format('Y-m-d H:i:s'));

            if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_POST['content'])AND isset($_POST['altImage']) 
            AND !empty($_POST['title']) AND !empty($_POST['chapo']) AND !empty($_POST['content']) AND !empty($_POST['altImage']))
            {
                $titleLength = strlen($_POST['title']);
                if($titleLength<=255)
                {
                    $altImageLength = strlen($_POST['altImage']);
                    if($altImageLength<=25)
                    {
                        $this->articleManager->updateArticle($newArticle, $idArt); 
                        //recover the datas to actualise the news datas
                        $article = $this->articleManager->readArticle($idArt);
                        $_POST = [];
                        $valide = "*Votre modification a bien été prise en compte";
                        $this->render('modifyArticle', [
                            'article' => $article,
                            'valide' => $valide,
                        ]);
                    }
                    else
                    {
                        $error = "*Votre description d'image ne doit pas dépasser 25 caractères";
                        $this->render('modifyArticle', [
                            'article' => $article,
                            'error' => $error,
                        ]);
                    }
                }
                else
                {
                    $error = "*Votre titre ne doit pas dépasser 255 caractères";
                    $this->render('modifyArticle', [
                        'article' => $article,
                        'error' => $error,
                    ]);
                }         
            }
            else
            {
                $error = "*Tous les champs n'ont pas été remplis";
                $this->render('modifyArticle', [
                    'article' => $article,
                    'error' => $error,
                ]);
            }
        }
    }
    
}