<?php

namespace app\src\controllers;
use app\src\models\LoginManager;

class Login extends Controller {

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
            $firstname_user = htmlspecialchars($_POST['firstname_user']);
            $lastname_user = htmlspecialchars($_POST['lastname_user']);
            $login_user = htmlspecialchars($_POST['login_user']);
            $email_user = htmlspecialchars($_POST['email_user']);

            if(!empty($_POST['firstname_user']) AND !empty($_POST['lastname_user']) AND !empty($_POST['login_user']) 
            AND !empty($_POST['password_user']) AND !empty($_POST['confirmPassword_user']) AND !empty($_POST['email_user']))
            {
                $pseudoLength = strlen($login_user);
                if($pseudoLength<=25)
                {
                    if(filter_var($email_user, FILTER_VALIDATE_EMAIL))
                    {
                        if($_POST['password_user'] == $_POST['confirmPassword_user'])
                        {     
                            
                            $this->spl_autoload_register('LoginManager');
                            $this->loginManager = new LoginManager();
                            $this->LoginManager->registerUser($firstname_user, $lastname_user, $email_user, $login_user, $_POST['password_user']); 
                            return $this->render('registrationConfirm');
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
                $error = "<br /><p class = font-weight-bold>**Tous les champs doivent être saisis<p>";
                return $this->render('registerView', [
                    'firstname_user' => $firstname_user,
                    'lastname_user' => $lastname_user,
                    'login_user' => $login_user,
                    'email_user' => $email_user,
                    'error' => $error,
                ]);
            }
        }
    }
}