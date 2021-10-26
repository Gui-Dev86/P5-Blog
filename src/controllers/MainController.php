<?php

namespace App\src\controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require (ROOT."vendor/phpmailer/phpmailer/src/Exception.php");
require (ROOT."vendor/phpmailer/phpmailer/src/PHPMailer.php");
require (ROOT."vendor/phpmailer/phpmailer/src/SMTP.php");
require (ROOT."env.php");

class Main extends AbstractController{

    /**
    * Display the home page
    *
    */
    public function home(){
        $this->render('home');
    }

    /**
    * Send a mail to the admin
    *
    */
    public function sendMail()
    {   
        if(isset($_POST['formSendMail'])) 
        {
            $mail = new PHPMailer(true);

            if(!empty($_POST["lastname"]) AND !empty($_POST["firstname"]) AND !empty($_POST["emailUser"]) AND !empty($_POST["message"]))
            {    
                if(filter_var($_POST["emailUser"], FILTER_VALIDATE_EMAIL))
                {
                    $lastname = htmlspecialchars($_POST['lastname']); 
                    $firstname = htmlspecialchars($_POST['firstname']); 
                    $emailUser = htmlspecialchars($_POST['emailUser']);
                    $message = htmlspecialchars($_POST['message']);

                    try {
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
                    
                        //SMTP Configuration and prepare the mail
                        $mail->isSMTP();
                        $mail->Host       = smtp;
                        $mail->SMTPAuth   = true;
                        $mail->Username   = email;
                        $mail->Password   = passwordEmail;
                        $mail->SMTPSecure = "tls";
                        $mail->Port       = port;
                        $mail->Charset = "utf-8";
                        $mail->addAddress(email);
                        $mail->setFrom($emailUser);
                        $mail->Subject = 'Formulaire de contact';
                        $mail->isHTML(true);
                        $mail->Body = $message.'<br /><p>Pour répondre veuillez utiliser cette adresse: <a href="mailto:'.$emailUser.'">'.$emailUser.'</a></p>';
                        $mail->send();
                        $_POST = [];

                        $_SESSION['valide'] = '<br /><p style="color: blue;" class = font-weight-bold>Votre message a bien été envoyé, 
                        nous répondrons dans les plus bref délais.<p>';
                    
                        return header('Location: ' . local.'' );
                        
                        
                    } catch (Exception $e) 
                    {
                        $_SESSION['error'] = "<p class='haut'>Message non envoyé. Veuillez recommencer</p>";
                    }
                }
                else
                { 
                    $_SESSION['error'] = "<br /><p class = font-weight-bold>*Votre adresse mail n'est pas valide<p>";
                    return header('Location: ' . local );
                }
            }
            else
            {
               $_SESSION['error'] = "<br /><p class = font-weight-bold>*Veuillez remplir tous les champs<p>";
                return header('Location: ' . local );
            }
            
        }
    }
}