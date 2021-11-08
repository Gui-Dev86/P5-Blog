<?php

namespace App\src\controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require ROOT."vendor/phpmailer/phpmailer/src/Exception.php";
require ROOT."vendor/phpmailer/phpmailer/src/PHPMailer.php";
require ROOT."vendor/phpmailer/phpmailer/src/SMTP.php";
require ROOT."env.php";

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

            if(!empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["emailUser"]) && !empty($_POST["message"]))
            {    
                if(filter_var($_POST["emailUser"], FILTER_VALIDATE_EMAIL))
                {
                    $emailUser = htmlspecialchars($_POST['emailUser'], FILTER_VALIDATE_EMAIL);
                    $message = htmlspecialchars($_POST['message']);

                    try {
                        
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

                        $valide = 'Votre message a bien été envoyé, nous répondrons dans les plus bref délais.';
                    
                        return $this->render('home', [
                            'valide' => $valide,
                        ]);
                        
                        
                    } catch (Exception $e) 
                    {
                        $error = "Message non envoyé. Veuillez recommencer";
                    }
                }
                else
                { 
                    $error = "*Votre adresse mail n'est pas valide";
                    return $this->render('home', [
                        'error' => $error,
                    ]);
                }
            }
            else
            {
               $error = "*Veuillez remplir tous les champs";
               return $this->render('home', [
                'error' => $error,
            ]);
            }
            
        }
    }
}
