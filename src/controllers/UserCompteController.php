<?php

namespace App\src\controllers;

use App\src\models\LoginManager;
use App\src\models\UserManager;
use App\src\models\ArticleManager;
use App\src\models\User;
use DateTime;

class UserCompte extends AbstractController{

    private $userManager;
    private $loginManager;
    private $articleManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->loginManager = new LoginManager();
        $this->articleManager = new ArticleManager();
    }

    /**
     * This method displays the user informations
     *
     * @return void
     */
    public function index(){
        if($this->isLogged() == false) {
            $this->render('home');
        } else {
            // On envoie les données à la vue index
            $this->render('userCompte');
        }
    }

    /**
     * This method displays the user modify compte
     *
     * @return void
     */
    public function userFormModifCompte(){
        if($this->isLogged() == false) {
            $this->render('home');
        } else {
            // On envoie les données à la vue index
            $this->render('userFormModifCompte');
        }
    }

    /**
     * This method displays the user comments list
     *
     * @return void
     */
    public function userListComment(){
        if($this->isLogged() == false) {
            $this->render('home');
        } else {
            
            if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
            {
                $idUser = $_SESSION['user']['idUser'];
            }
            //recover the third URL parameter number page
            if(isset($_SESSION["paramURL"]) && !empty($_SESSION["paramURL"]))
            {
                $paramURL = (int) strip_tags($_SESSION["paramURL"]);
            }
            
            //count the comments number in the database
            $userCommentsCount = $this->articleManager->countCommentsUser($idUser);
            $nbCommentsUser = (int) $userCommentsCount['nbCommentUser'];
            //number of articles per page
            $commentsParPage = 5;
            //calculate the pages number
            $pages = ceil($nbCommentsUser / $commentsParPage);
            //calculate the first comment per page
            $firstComment = ($paramURL * $commentsParPage) - $commentsParPage;
            
            //recover the datas of all comments in $comments
            $comments = $this->articleManager->readUserComments($idUser, $firstComment, $commentsParPage);
        
            // On envoie les données à la vue index
            $this->render('userListComment', [
                'comments' => $comments,
                'pages' => $pages,
                'numPage' => $paramURL,
            ]);
        }
    }

    /**
     * This method modify the data's user
     *
     */
    public function userModifyDatas(){

        if(isset($_POST['modifyDatas'])) 
        {
            $date = new DateTime();

            $updateUser = new User();
            $updateUser->setFirstname_user(htmlspecialchars($_POST['newFirstname']));
            $updateUser->setLastname_user(htmlspecialchars($_POST['newLastname']));
            $updateUser->setLogin_user(htmlspecialchars($_POST['newLogin']));
            $updateUser->setEmail_user(htmlspecialchars($_POST['newEmail']));
            $updateUser->setDateUpdate_user($date->format('Y-m-d H:i:s'));

            $idUser = $_SESSION['user']['idUser'];
            
            //Verify if the login and the email are available
            $loginAvailable = $this->userManager->loginAvailable($updateUser, $idUser);
            $mailAvailable = $this->userManager->mailAvailable($updateUser, $idUser);

            if(!empty($_POST['newLogin']) AND !empty($_POST['newFirstname']) AND !empty($_POST['newLastname']) 
            AND !empty($_POST['newEmail']))
            {
                if($loginAvailable['nbLogin'] === '0' AND $mailAvailable['nbMail'] === '0')
                {
                    if(filter_var($_POST['newEmail'], FILTER_VALIDATE_EMAIL))
                    {
                        $pseudoLength = strlen($_POST['newLogin']);
                        if($pseudoLength<=25)
                        {   
                            $idUser = $_SESSION['user']['idUser'];
                            $this->userManager->updateUser($updateUser, $idUser); 
                        
                            $dataUser = $this->userManager->readUser($idUser);
                            //update the user session to display the news datas
                            $this->createSession($dataUser);
                            $_POST = [];
                            header('Location: ' . local.'userCompte');
                        }
                        else
                        {
                            $error = "*Votre pseudo ne doit pas dépasser 25 caractères";
                            return $this->render('userFormModifCompte', [
                                'error' => $error,
                            ]);
                        }
                    }
                    else
                    {
                        $error = "*Votre adresse mail n'est pas valide";
                            return $this->render('userFormModifCompte', [
                                'error' => $error,
                            ]);
                    }
                }
                else
                {
                    $error = "*L'adresse email ou le pseudo saisi est déjà utilisé";
                    return $this->render('userFormModifCompte', [
                        'error' => $error,
                    ]);
                }
            }
            else
            {
                $error = "**Tous les champs doivent être saisis";
                return $this->render('userFormModifCompte', [
                    'error' => $error,
                ]);
            }
        }
    }

    /**
     * Modify the password
     *
     */
    public function userModifyPassword()
    {  
        if(isset($_POST['formModifyPassword'])) 
        {
            $hashedpassword = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);
            $newPassUser = new User();
            $newPassUser->setLogin_user(htmlspecialchars($_SESSION['user']['login']));
            $newPassUser->setPassword_user($hashedpassword);

            if(!empty($_POST['oldPassword']) AND !empty($_POST['newPassword']) AND !empty($_POST['newPasswordConfirm']) AND
            isset($_POST['oldPassword']) AND isset($_POST['newPassword']) AND isset($_POST['newPasswordConfirm']))
            {     
            
                $oldPassword = $_POST["oldPassword"];

                //recup the informations for the user
                $dataUser = $this->loginManager->readUserLogin($newPassUser);
                //verify the password length
                $passwordLength = strlen($_POST['newPassword']);
                if($passwordLength>=8)
                {
                    if(password_verify($oldPassword, $dataUser['password_user']))
                    {   
                        //verify if the login and the password correspond
                        if($_POST['newPassword'] == $_POST['newPasswordConfirm'])
                        {
                            $this->userManager->updatePassword($newPassUser);
                            $_POST = [];
                            $valide = 'Votre mot de passe a été modifié avec succès.';
                            return $this->render('userCompte', [
                                'valide' => $valide,
                            ]);
                        }
                        else
                        {
                            $error = "*Vos mots de passes de correspondent pas";
                            return $this->render('userCompte', [
                                'error' => $error,
                            ]);
                        }
                    }
                    else
                    {
                        $error = "*Votre mot de passe est incorrect";
                        return $this->render('userCompte', [
                            'error' => $error,
                        ]);
                    }
                }
                else
                {
                    $error = "*Votre mot de passe doit faire au moins 8 caractères";
                    return $this->render('userCompte', [
                    'error' => $error,
                    ]);
                }
            }
            else
            {
                $error = "**Tous les champs doivent être saisis";
                return $this->render('userCompte', [
                    'error' => $error,
                ]);
            }
        }
    }

    /**
     * This method active the compte by the user
     *
     */
    public function activeCompteUser() {
        $activeUser = new User();
        $activeUser->setLogin_user(htmlspecialchars($_SESSION['user']['login']));
        $activeUser->setIsActiveUser_user(htmlspecialchars($_SESSION['user']['isActiveUser']));
        
        $idUser = $_SESSION['user']['idUser'];
        $this->userManager->activeStatusUser($activeUser);

        $datasUser = $this->userManager->readUser($idUser);
        //update the user session to display the news datas
        $this->createSession($datasUser);

       header('Location: ' . local.'userCompte');
    }

    /**
     * This method disable the compte by the user
     *
     */
    public function disableCompteUser() {
        $disableStatusUser = new User();
        $disableStatusUser->setLogin_user(htmlspecialchars($_SESSION['user']['login']));
        $disableStatusUser->setIsActiveUser_user(htmlspecialchars($_SESSION['user']['isActiveUser']));
        
        $idUser = $_SESSION['user']['idUser'];
        $this->userManager->disableStatusUser($disableStatusUser);
        
        $datasUser = $this->userManager->readUser($idUser);
        //update the user session to display the news datas
        $this->createSession($datasUser);

        header('Location: ' . local.'userCompte');
    }
}