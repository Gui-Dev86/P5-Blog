<?php

namespace App\src\controllers;

use App\src\models\LoginManager;
use App\src\models\User;
use DateTime;

class Login extends AbstractController {
    
    private $loginManager;

    public function __construct()
    {
        $this->loginManager = new LoginManager();
    }

    /**
     * This method displays the login page
     *
     * @return void
     */
    public function index(){
    
        $this->render('login');
    }
    
    /**
     * This method displays the register page
     *
     * @return void
     */
    public function registerView(){
    
        $this->render('registerView');
    }
    
    /**
     * This method displays the confirm register page
     *
     * @return void
     */
    public function registrationConfirm(){
    
        $this->render('registrationConfirm');
    }

    /**
     * This method displays the forgotten password page
     *
     * @return void
     */
    public function recupPassword(){
    
        $this->render('recupPassword');
    }

     /**
     * This method displays the register page
     *
     * @return void
     */
    public function registerUser(){

        if(isset($_POST['formRegistration'])) 
        {
            $date = new DateTime();
            
            $hashedpassword = password_hash($_POST['password_user'], PASSWORD_DEFAULT);

            $newUser = new User();
            $newUser->setFirstname_user(htmlspecialchars($_POST['firstname_user']));
            $newUser->setLastname_user(htmlspecialchars($_POST['lastname_user']));
            $newUser->setLogin_user(htmlspecialchars($_POST['login_user']));
            $newUser->setPassword_user($hashedpassword);
            $newUser->setEmail_user(htmlspecialchars($_POST['email_user']));
            $newUser->setDateCreate_user($date->format('Y-m-d H:i:s'));
            $newUser->setDateUpdate_user($date->format('Y-m-d H:i:s'));

           //Verify if the login and the email are available
            $loginAvailable = $this->loginManager->loginAvailable($newUser);
        
            if(!empty($_POST['firstname_user']) AND !empty($_POST['lastname_user']) AND !empty($_POST['login_user']) 
            AND !empty($_POST['password_user']) AND !empty($_POST['confirmPassword_user']) AND !empty($_POST['email_user']))
            {
                if($loginAvailable['nbLogin'] === '0')
                {
                    $pseudoLength = strlen($_POST['login_user']);
                    if($pseudoLength<=25)
                    {
                        if(filter_var($_POST['email_user'], FILTER_VALIDATE_EMAIL))
                        {
                            if($_POST['password_user'] == $_POST['confirmPassword_user'])
                            {     
                                $this->loginManager->createUser($newUser); 
                                $_POST = [];
                                return header('Location: ' . local . 'login/registrationConfirm');
                            }
                            else
                            {
                                $error = "<br /><p class = font-weight-bold>*Vos mots de passes de correspondent pas<p>";
                                return $this->render('registerView', [
                                'error' => $error,
                                ]);
                            }
                        }
                        else
                        {
                            $error = "<br /><p class = font-weight-bold>*Votre adresse mail n'est pas valide<p>";
                            return $this->render('registerView', [
                            'error' => $error,
                            ]);
                        }
                    }
                    else
                    {
                        $error = "<br /><p class = font-weight-bold>*Votre pseudo ne doit pas dépasser 25 caractères<p>";
                        return $this->render('registerView', [
                            'error' => $error,
                        ]);
                    }
                }
                else
                {
                    $error = "<br /><p class = font-weight-bold>*Le pseudo ou l'adresse mail saisi est déjà utilisé<p>";
                        return $this->render('registerView', [
                            'error' => $error,
                        ]);
                }
            } 
            else 
            {
                $error = "<br /><p class = font-weight-bold>**Tous les champs doivent être saisis<p>";
                return $this->render('registerView', [
                    'firstname_user' => $_POST['firstname_user'],
                    'lastname_user' => $_POST['lastname_user'],
                    'login_user' => $_POST['login_user'],
                    'email_user' => $_POST['email_user'],
                    'error' => $error,
                ]);
            }
        }
    }
}