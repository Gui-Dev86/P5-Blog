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
            
            $hashedpassword = password_hash($_POST['password_user'], PASSWORD_BCRYPT);

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
            $emailAvailable = $this->loginManager->emailAvailable($newUser);

            if(!empty($_POST['firstname_user']) AND !empty($_POST['lastname_user']) AND !empty($_POST['login_user']) 
            AND !empty($_POST['password_user']) AND !empty($_POST['confirmPassword_user']) AND !empty($_POST['email_user']))
            {
                if($loginAvailable['nbLogin'] === '0')
                {
                    if($emailAvailable['nbEmail'] === '0')
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
                        $error = "<br /><p class = font-weight-bold>*L'adresse email saisie est déjà utilisée<p>";
                            return $this->render('registerView', [
                                'error' => $error,
                            ]);
                    }
                }
                else
                {
                    $error = "<br /><p class = font-weight-bold>*Le pseudo saisi est déjà utilisé<p>";
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

    /**
     * Login user
     *
     */
    public function loginUser()
    {   

        if(isset($_POST["formLogin"]))
        {
            $newUser = new User();
            $newUser->setLogin_user(htmlspecialchars($_POST['login']));
            if(!empty($_POST['login']) AND !empty($_POST['password']))
            {        
                $login = $_POST["login"];
                $password = $_POST["password"];

                //recup the informations for the login in an array
                $loginOk = $this->loginManager->verifyLog($newUser);
                $_POST = [];
                //verify if the login and the password correspond
                if(password_verify($password, $loginOk['password_user']))
                {
                    //$this->session->createSession($loginOk);
                    $_SESSION['login']=$login;
                    $_SESSION['password']=$password;
                    var_dump($_SESSION);
                    echo "ok";
                    

                    return $this->render('home');

                
                }
                else
                {
                $error = "<br /><p class = font-weight-bold>*Votre identifiant ou mot de passe est incorrect<p>";
                return $this->render('login', [
                    'error' => $error,
                ]);
                }
            }
        }
    }

    /**
     * Disconnect the user
     */
    public function logOutUser()
    {
        $this->session->clear();
        $this->home();
    }

    /**
     * Recover the user's password
     *
     */
    public function recoverPassword()
    {   
        if(isset($_POST["formRecoverPassword"]))
        {   
            if(!empty($_POST['email_user']))
            {  
                $mailUser = $_POST['email_user'];
                $newUser = new User();
                $newUser->setEmail_user(htmlspecialchars($_POST['email_user']));
                $emailDatabase = $this->loginManager->emailAvailable($newUser);
                $_POST = [];
                if($emailDatabase['nbEmail'] === '1') {

                    $date = new DateTime();
                    //generate the token to verify the user
                    $stringToken = implode('',array_merge(range('A','Z'), range('a','z'), range('0','9')));
                    $token = substr(str_shuffle($stringToken), 0,20);

                    $newUser->setTokenNewPass_user(htmlspecialchars($token));
                    $newUser->setDateNewPass_user($date->format('Y-m-d H:i:s'));
                    $insertToken = $this->loginManager->insertToken($newUser);

                    $linkResetMail = ''.local.'login/newPassword?token='.$token.'';
                    $toMailUser = $mailUser;
                    $subject = 'Réinitialisation de votre mot de passe';
                    $message = '<h1>Réinitialisation de votre mot de passe</h1><p>Pour réinitialiser votre mot de passe, 
                    veuillez suivre ce lien: <a href = "'.$linkResetMail.'">'.$linkResetMail.'</a></p>';
                    $headers=[];
                    $headers[] = 'MIME-Version:1.0';
                    $headers[] = 'Content-type: text/html; charset=utf8';
                    $headers[] = 'To: '.$toMailUser.' <'.$toMailUser.'>';
                    $headers[] = 'Blog d\'un développeur <g.vigneres65@orange.fr>';
                    mail($toMailUser,$subject,$message, implode("\r\n", $headers));
                    echo $toMailUser,$subject,$message, implode("\r\n", $headers);
                    $message = '<br /><p style="color: blue;" class = font-weight-bold>Un mail a été acheminé. 
                    Veuillez regarder dans votre boîte mail et suivre les instructions à l\'intérieur du mail.<p>';
                    return $this->render('recupPassword', [
                        'message' => $message,
                    ]);

                }
                else
                {
                    $error = "<br /><p class = font-weight-bold>*L'adresse email saisie n'est pas enregistrée<p>";
                    return $this->render('recupPassword', [
                        'error' => $error,
                    ]);
                }
            }
        }
    }
    /**
     * Choose a new password
     *
     */
    public function newPassword()
    {  
        if(empty($_GET['token']))
        {  
            echo "Aucun token n'a été trouvé";
            exit;
        }




        if(isset($_POST["formNewPassword"]))
        {   
            if(!empty($_POST['email_user']))
            { 
            }
        }
    }
}