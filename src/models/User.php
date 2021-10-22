<?php

namespace App\src\models;

class User extends AbstractManager {

    /**
     * @var int $user_id user ID
     */
    private $id_user;

    /**
     * @var string $lasname_user
     */
    private $lastname_user;

    /**
     * @var string $firstname_user
     */
    private $firstname_user;

    /**
     * @var string $mail_user
     */
    private $email_user;

    /**
     * @var string $login_user
     */
    private $login_user;

    /**
     * @var string $password_user
     */
    private $password_user;

    /**
     * @var bool $role_user
     */
    private $role_user;

    /**
     * @var string $dateCreate_user;
     */
    private $dateCreate_user;

    /**
     * @var string $dateUpdate_user;
     */
    private $dateUpdate_user;

    /**
     * @var bool $statut_user
     */
    private $statut_user;

    /**
     * @var bool $isActiveUser_user
     */
    private $isActiveUser_user;

    /**
     * @var bool $isActiveAdmin_user
     */
    private $isActiveAdmin_user;

    /**
     * @var string $tokeneNewPass_user;
     */
    private $tokenNewPass_user;

    /**
     * @var string $dateNewPass_user;
     */
    private $dateNewPass_user;

    public function __construct($datas = [])
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "user";
            
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();

        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    public function hydrate($datas)
    {

        foreach ($datas as $key => $value) {
            $key = lcfirst(str_replace('_', '', ucwords($key, '_')));
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     * @return User
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname_user()
    {
        return $this->lastname_user;
    }

    /**
     * @param mixed $lastname_user
     * @return User
     */
    public function setLastname_user($lastname_user)
    {
        $this->lastname_user = $lastname_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstname_user()
    {
        return $this->firstname_user;
    }

    /**
     * @param mixed $firstname_user
     * @return User
     */
    public function setFirstname_user($firstname_user)
    {
        $this->firstname_user = $firstname_user;
        return $this;
    }

/**
     * @return mixed
     */
    public function getEmail_user()
    {
        return $this->email_user;
    }

    /**
     * @param mixed $email_user
     * @return User
     */
    public function setEmail_user($email_user)
    {
        $this->email_user = $email_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogin_user()
    {
        return $this->login_user;
    }

    /**
     * @param mixed $login_user
     * @return User
     */
    public function setLogin_user($login_user)
    {
        $this->login_user = $login_user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword_user()
    {
        return $this->password_user;
    }

    /**
     * @param mixed $password_user
     * @return User
     */
    public function setPassword_user($password_user)
    {
        $this->password_user = $password_user;
        return $this;
    }

    /**
     * @return bool
     */
    public function getRole_user()
    {
        return $this->role_user;
    }

    /**
     * @param bool $role_user
     * @return User
     */
    public function setRole_user(bool $role_user)
    {
        $this->role_user = $role_user;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDateCreate_user()
    {
        return $this->dateCreate_user;
    }

    /**
     * @param string $dateCreate_user
     * @return User
     */
    public function setDateCreate_user(string $dateCreate_user)
    {
        $this->dateCreate_user = $dateCreate_user;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateUpdate_user()
    {
        return $this->dateUpdate_user;
    }

    /**
     * @param string $dateUpdate_user
     * @return User
     */
    public function setDateUpdate_user(string $dateUpdate_user)
    {
        $this->dateUpdate_user = $dateUpdate_user;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsActiveUser_user()
    {
        return $this->isActiveUser_user;
    }

    /**
     * @param bool $isActiveUser_user
     * @return User
     */
    public function setIsActiveUser_user(bool $isActiveUser_user)
    {
        $this->isActiveUser_user = $isActiveUser_user;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsActiveAdmin_user()
    {
        return $this->isActiveAdmin_user;
    }

    /**
     * @param bool $isActiveAdmin_user
     * @return User
     */
    public function setIsActiveAdmin_user(bool $isActiveAdmin_user)
    {
        $this->isActiveAdmin_user = $isActiveAdmin_user;
        return $this;
    }

     /**
     * @return string
     */
    public function getTokenNewPass_user()
    {
        return $this->tokenNewPass_user;
    }

    /**
     * @param string $tokenNewPass_user
     * @return User
     */
    public function setTokenNewPass_user(string $tokenNewPass_user)
    {
        $this->tokenNewPass_user = $tokenNewPass_user;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateNewPass_user()
    {
        return $this->dateNewPass_user;
    }

    /**
     * @param string $dateNewPass_user
     * @return User
     */
    public function setDateNewPass_user(string $dateNewPass_user)
    {
        $this->dateNewPass_user = $dateNewPass_user;
        return $this;
    }
}