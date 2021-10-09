<?php

namespace App\src\controllers;

use App\src\models\LoginManager;
use App\src\models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use DateTime;

require (ROOT."vendor/phpmailer/phpmailer/src/Exception.php");
require (ROOT."vendor/phpmailer/phpmailer/src/PHPMailer.php");
require (ROOT."vendor/phpmailer/phpmailer/src/SMTP.php");
require (ROOT."env.php");

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
     * This method displays the page to recover the password
     *
     * @return void
     */
    public function newPassword(){
    
        $this->render('newPassword');
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
                        $error = "<br /><p class = font-weight-bold>*L'adresse email ou le pseudo saisi est déjà utilisée<p>";
                            return $this->render('registerView', [
                                'error' => $error,
                            ]);
                    }
                }
                else
                {
                    $error = "<br /><p class = font-weight-bold>*L'adresse email ou le pseudo saisi est déjà utilisé<p>";
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
            if(!empty($_POST['login']) AND !empty($_POST['password']) AND 
            isset($_POST['login']) AND isset($_POST['password']))
            {        
                $login = $_POST["login"];
                $password = $_POST["password"];

                //recup the informations for the user
                $dataUser = $this->loginManager->readUser($newUser);
                $_POST = [];
                //verify if the login and the password correspond
                if(password_verify($password, $dataUser['password_user']))
                {   
                    $this->createSession($dataUser);
                    header('Location: ' . local);
                }
                else
                {
                $error = "<br /><p class = font-weight-bold>*Votre identifiant ou mot de passe est incorrect<p>";
                return $this->render('login', [
                    'error' => $error,
                ]);
                }
            }
            else
            {
                return $this->render('login');
            }
        }
    }

    /**
     * Disconnect the user
     */
    public function logOutUser()
    {
        unset($_SESSION["user"]);
        header('Location: ' . local);
    }

    /**
     * Recover the user's password
     *
     */
    public function recoverPassword()
    {   
        $mail = new PHPMailer(true);

        if(isset($_POST["formRecoverPassword"]))
        {   
            if(!empty($_POST['email_user']))
            {
                $mailUser = $_POST['email_user']; 
                try {
               
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
               
                $newUser = new User();
                $newUser->setEmail_user(htmlspecialchars($_POST['email_user']));
                //verify if the mail is in the database
                $emailDatabase = $this->loginManager->emailAvailable($newUser);
                $_POST = [];
                
                    if($emailDatabase['nbEmail'] === '1') 
                    {
                        //generate the token to verify the user
                        $stringToken = implode('',array_merge(range('A','Z'), range('a','z'), range('0','9')));
                        $token = substr(str_shuffle($stringToken), 0,20);
    
                        $newUser->setTokenNewPass_user(htmlspecialchars($token));
                        $insertToken = $this->loginManager->insertToken($newUser);

                        $linkResetMail = ''.local.'login/newPassword/'.$token.'';

                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
                    
                        //SMTP Configuration and prepare the mail
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = email;
                        $mail->Password   = passwordEmail;
                        $mail->SMTPSecure = "tls";
                        $mail->Port       = 587;
                        $mail->Charset = "utf-8";
                        $mail->addAddress($mailUser);
                        $mail->setFrom(email, 'Reinitialisation de votre mot de passe');
                        $mail->Subject = 'Reinitialisation de votre mot de passe';
                        $mail->isHTML(true);
                        $mail->Body = '<h1>Reinitialisation de votre mot de passe</h1><p>Pour reinitialiser votre mot de passe, 
                        veuillez suivre ce lien: <a href = "'.$linkResetMail.'">'.$linkResetMail.'</a></p>';
                        $mail->send();
                        $_POST = [];

                        $_SESSION['valide'] = '<br /><p style="color: blue;" class = font-weight-bold>Un mail a été acheminé. 
                        Veuillez regarder dans votre boîte mail et suivre les instructions à l\'intérieur du mail.<p>';
                   
                        return header('Location: ' . local . 'login/recupPassword');
                    }
                    else
                    {
                        $error = "<br /><p class = font-weight-bold>*L'adresse email saisie n'est pas enregistrée<p>";
                        return $this->render('recupPassword', [
                            'error' => $error,
                        ]);
                    }
                
                } catch (Exception $e) 
                {
                    $error = "<p class='haut'>Message non envoyé. Veuillez recommencer</p>";
                }
            }
            else
            {
                return $this->render('recupPassword');
            }
        }
    }


    /**
     * Choose a new password
     *
     */
    public function userNewPassword()
    {   
        //recover the token in the session
        $token = $_SESSION["token"];

        if(!empty($_POST['newPassword_user']) AND !empty($_POST['confirmNewPassword_user']) AND 
            isset($_POST['newPassword_user']) AND isset($_POST['confirmNewPassword_user']))
        {
            if($_POST['newPassword_user'] == $_POST['confirmNewPassword_user'])
            { 
                $newHashedpassword = password_hash($_POST['newPassword_user'], PASSWORD_BCRYPT);
                $date = new DateTime();
                $newUser = new User();
                $newUser->setPassword_user($newHashedpassword);
                //save the date
                $newUser->setDateNewPass_user($date->format('Y-m-d H:i:s'));
                $newUser->setTokenNewPass_user(htmlspecialchars($token));
                //change the password and pass to NULL the token
                $this->loginManager->newPass($newUser);

                $_SESSION['valide'] = '<br /><p style="color: blue;" class = font-weight-bold>Votre mot de passe a été modifié avec succès.<p>';

                header('Location: ' . local.'login/newPassword');
            }
            else
            {
                $_SESSION['error'] = "<br /><p class = font-weight-bold>*Vos mots de passes de correspondent pas<p>";
                header('Location: ' . local.'login/newPassword/'.$token.'');
            }
        }
        else
        {var_dump($token);
            header('Location: ' . local.'login/newPassword/'.$token.'');
        }
    }
}