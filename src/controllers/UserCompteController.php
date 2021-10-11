<?php

namespace App\src\controllers;

use App\src\models\UserManager;
use App\src\models\User;

class UserCompte extends AbstractController{

    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    /**
     * This method displays the user informations
     *
     * @return void
     */
    public function index(){
        if($this->isLogged() == false) {
            header('Location: ' . local);
            exit;
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
            header('Location: ' . local);
            exit;
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
            header('Location: ' . local);
            exit;
        } else {
            // On envoie les données à la vue index
            $this->render('userListComment');
        }
    }

    /**
     * This method modify the data's user
     *
     */
    public function userModifyDatas(){

        if(isset($_POST['modifyDatas'])) 
        {
            $idUser = $_SESSION['user']['idUser'];
            $updateUser = new User();
            $updateUser->setId_user(htmlspecialchars($idUser));
            $updateUser->setFirstname_user(htmlspecialchars($_POST['newFirstname']));
            $updateUser->setLastname_user(htmlspecialchars($_POST['newLastname']));
            $updateUser->setLogin_user(htmlspecialchars($_POST['newLogin']));
            $updateUser->setEmail_user(htmlspecialchars($_POST['newEmail']));
            
            //Verify if the login and the email are available
            $loginMailAvailable = $this->userManager->loginMailAvailable($updateUser);

            if(!empty($_POST['newLogin']) AND !empty($_POST['newFirstname']) AND !empty($_POST['newLastname']) 
            AND !empty($_POST['newEmail']))
            {
                if($loginMailAvailable['nbLoginMail'] === '0')
                {
                    if(filter_var($_POST['newEmail'], FILTER_VALIDATE_EMAIL))
                    {
                        $pseudoLength = strlen($_POST['newLogin']);
                        if($pseudoLength<=25)
                        {
                            $this->userManager->updateUser($updateUser); 
                        
                            $dataUser = $this->userManager->readUser($updateUser);
                            //update the user session to display the news datas
                            $this->createSession($dataUser);
                            $_POST = [];

                            header('Location: ' . local.'userCompte');
                        }
                        else
                        {
                            $error = "<br /><p class = font-weight-bold>*Votre pseudo ne doit pas dépasser 25 caractères<p>";
                            return $this->render('userFormModifCompte', [
                            'error' => $error,
                            ]);
                        }
                    }
                    else
                    {
                        $error = "<br /><p class = font-weight-bold>*Votre adresse mail n'est pas valide<p>";
                            return $this->render('userFormModifCompte', [
                                'error' => $error,
                            ]);
                    }
                }
                else
                {
                    $error = "<br /><p class = font-weight-bold>*L'adresse email ou le pseudo saisi est déjà utilisé<p>";
                            return $this->render('userFormModifCompte', [
                                'error' => $error,
                            ]);
                }
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

      /**
     * This method modify the status user
     *
     */
    public function userModifyStatus() {
    }
}