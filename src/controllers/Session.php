<?php

namespace App\;


/**
 * Class Session
 * @package App\
 */
class Session
{
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
        $this->session = filter_var_array($_SESSION);

        if (isset($this->session['user'])) {
            $this->user = $this->session['user'];
        }
    }

    /**
     * @param array $data
     */
    public function createSession(array $data)
    {
        if ($data['role'] == 0) $data['role'] = self::USER;
        elseif ($data['role'] == 1) $data['role'] = self::ADMIN;

        $this->session['user'] = [
            'sessionId' => session_id(),
            'login' => $data['login_user'],
            'idUser' => $data['id_user'],
            'email' => $data['email_user'],
            'dateRegister' => $data['dateCreate_user'],
            'dateUpdate' => $data['dateUpdate_user'],
            'role' => $data['role_user']
        ];
        $this->user = $this->session['user'];
        $_SESSION['user'] = $this->session['user'];
        $this->verifyRole();
    }

    public function logout()
    {
        unset($_SESSION);
        session_destroy();
    }

    /**
     * @return bool
     */
    public function isLogged()
    {
        if (!empty($this->getUserVar('sessionId'))) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        if ($this->getUserVar('role') !== 'Administrateur') {
            header('Location:'.local);
        }
        return true;
    }

    public function isUser()
    {
        if ($this->getUserVar('role') !== 'Utilisateur') {
            header('Location:'.local);
        }
        return true;
    }


    /**
     * @return mixed
     */
    public function getUserArray()
    {
        return $this->user;
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

    /**
     *
     */
    private function verifyRole()
    {
        if ($this->getUserVar('role') == 0) {
            $this->setUserVar('role', self::USER);
        } elseif ($this->getUserVar('role') == 1) {
            $this->setUserVar('role', self::ADMIN);
        }
    }

}