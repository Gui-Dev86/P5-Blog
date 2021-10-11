<?php

namespace App\src\controllers;

use App\vendor\Exception;

abstract class AbstractController {

    const ADMIN = 'Administrateur';

    const USER = 'Utilisateur';

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
     * @param string $fichier
     * @param array $data
     * @return void
     */
    public function render(string $fichier, array $data = []){
        extract($data);

        // On démarre le buffer de sortie
        ob_start();

        // On génère la vue
        if( file_exists( 'src/views/'.$fichier.'.php' ) ) {
            require_once(ROOT.'src/views/'.$fichier.'.php');
        } else {
            require_once(ROOT.'src/views/back/'.$fichier.'.php');
        }

        // On stocke le contenu dans $content
        $content = ob_get_clean();

        // On fabrique le "template"
        require_once(ROOT.'src/views/layout/base.php');
        
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