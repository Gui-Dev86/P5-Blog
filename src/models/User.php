<?php

namespace App\src\models;

class User extends AbstractManager {

    /**
     * @var int $user_id user ID
     */
    private $idUser;

    /**
     * @var string $lasname_user
     */
    private $lastnameUser;

    /**
     * @var string $firstname_user
     */
    private $firstnameUser;

    /**
     * @var string $mail_user
     */
    private $emailUser;

    /**
     * @var string $login_user
     */
    private $loginUser;

    /**
     * @var string $password_user
     */
    private $passwordUser;

    /**
     * @var bool $role_user
     */
    private $roleUser;

    /**
     * @var string $dateCreate_user;
     */
    private $dateCreateUser;

    /**
     * @var string $dateUpdate_user;
     */
    private $dateUpdateUser;

    /**
     * @var bool $isActiveUser_user
     */
    private $isActiveUserUser;

    /**
     * @var bool $isActiveAdmin_user
     */
    private $isActiveAdminUser;

    /**
     * @var string $tokeneNewPass_user;
     */
    private $tokenNewPassUser;

    /**
     * @var string $dateNewPass_user;
     */
    private $dateNewPassUser;

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
        return $this->idUser;
    }

    /**
     * @param mixed $id_user
     * @return User
     */
    public function setId_user($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname_user()
    {
        return $this->lastnameUser;
    }

    /**
     * @param mixed $lastname_user
     * @return User
     */
    public function setLastname_user($lastnameUser)
    {
        $this->lastnameUser = $lastnameUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstname_user()
    {
        return $this->firstnameUser;
    }

    /**
     * @param mixed $firstname_user
     * @return User
     */
    public function setFirstname_user($firstnameUser)
    {
        $this->firstnameUser = $firstnameUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail_user()
    {
        return $this->emailUser;
    }

    /**
     * @param mixed $email_user
     * @return User
     */
    public function setEmail_user($emailUser)
    {
        $this->emailUser = $emailUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogin_user()
    {
        return $this->loginUser;
    }

    /**
     * @param mixed $login_user
     * @return User
     */
    public function setLogin_user($loginUser)
    {
        $this->loginUser = $loginUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword_user()
    {
        return $this->passwordUser;
    }

    /**
     * @param mixed $password_user
     * @return User
     */
    public function setPassword_user($passwordUser)
    {
        $this->passwordUser = $passwordUser;
        return $this;
    }

    /**
     * @return bool
     */
    public function getRole_user()
    {
        return $this->roleUser;
    }

    /**
     * @param bool $role_user
     * @return User
     */
    public function setRole_user(bool $roleUser)
    {
        $this->roleUser = $roleUser;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDateCreate_user()
    {
        return $this->dateCreateUser;
    }

    /**
     * @param string $dateCreate_user
     * @return User
     */
    public function setDateCreate_user(string $dateCreateUser)
    {
        $this->dateCreateUser = $dateCreateUser;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateUpdate_user()
    {
        return $this->dateUpdateUser;
    }

    /**
     * @param string $dateUpdate_user
     * @return User
     */
    public function setDateUpdate_user(string $dateUpdateUser)
    {
        $this->dateUpdateUser = $dateUpdateUser;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsActiveUser_user()
    {
        return $this->isActiveUserUser;
    }

    /**
     * @param bool $isActiveUser_user
     * @return User
     */
    public function setIsActiveUser_user(bool $isActiveUserUser)
    {
        $this->isActiveUserUser = $isActiveUserUser;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsActiveAdmin_user()
    {
        return $this->isActiveAdminUser;
    }

    /**
     * @param bool $isActiveAdmin_user
     * @return User
     */
    public function setIsActiveAdmin_user(bool $isActiveAdminUser)
    {
        $this->isActiveAdminUser = $isActiveAdminUser;
        return $this;
    }

     /**
     * @return string
     */
    public function getTokenNewPass_user()
    {
        return $this->tokenNewPassUser;
    }

    /**
     * @param string $tokenNewPass_user
     * @return User
     */
    public function setTokenNewPass_user(string $tokenNewPassUser)
    {
        $this->tokenNewPassUser = $tokenNewPassUser;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateNewPass_user()
    {
        return $this->dateNewPassUser;
    }

    /**
     * @param string $dateNewPass_user
     * @return User
     */
    public function setDateNewPass_user(string $dateNewPassUser)
    {
        $this->dateNewPassUser = $dateNewPassUser;
        return $this;
    }
}