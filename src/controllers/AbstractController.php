<?php

namespace App\src\controllers;

use App\vendor\Exception;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController {

    const ADMIN = 'Administrateur';

    const USER = 'Utilisateur';

    private $twig;

    /**
     * @var mixed
     */
    private $session;

    /**
     * @var
     */
    private $user;

    /**
     * SessionController constructor.
     */
    public function __construct()
    {
      
    }

    /**
     * Afficher une vue
     *
     * @param string $view
     * @param array $data
     * @return void
     */
    public function render(string $view, array $data = [])
    {
        $loader = new FilesystemLoader('src/views');
        $this->twig = new Environment(
            $loader, [
            'cache' => false, // __DIR__ . /tmp',
            'debug' => true,] 
        );
        if(isset($_SESSION['user'])) {
            $this->twig->addGlobal("session", $_SESSION['user']);
        }
        //define the constant to recover the good css file
        define('view', $view);
        
        try {
            if( file_exists('src/views/front/'.$view.'.twig')) {
                print_r($this->twig->render('front/'. $view . '.twig', $data));
            } else {
                print_r($this->twig->render('back/'. $view . '.twig', $data));
            }
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }  
    }

    /**
     * @param array $data
     */
    public function createSession(array $data)
    {   
        $this->session['user'] = [
            'sessionId' => session_id(),
            'idUser' => $data['id_user'],
            'lastname' => $data['lastname_user'],
            'firstname' => $data['firstname_user'],
            'login' => $data['login_user'],
            'email' => $data['email_user'],
            'dateRegister' => $data['dateCreate_user'],
            'dateUpdate' => $data['dateUpdate_user'],
            'role' => $data['role_user'],
            'isActiveUser' => $data['isActiveUser_user'],
            'isActiveAdmin' => $data['isActiveAdmin_user']
        ];
        $this->user = $this->session['user'];
        $_SESSION['user'] = $this->session['user'];
        return $_SESSION['user'];
    }
    
    

    /**
     * @return bool
     */
    public function isLogged()
    {
        if (isset($_SESSION['user']['login'])) {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        if($this->isLogged())
        {
            if (isset($_SESSION['user']['role']) AND $_SESSION['user']['role'] == 1) {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    /**
     * @param $var
     * @return mixed
     */
    public function getUserVar($var)
    {
        return $this->user[$var];
    }


    /**
     * @param string $var
     * @param $data
     */
    public function setUserVar(string $var, $data)
    {
        $this->user[$var] = $data;
    }

}