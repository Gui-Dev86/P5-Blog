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
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $id_user
     * @return User
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastnameUser()
    {
        return $this->lastnameUser;
    }

    /**
     * @param mixed $lastname_user
     * @return User
     */
    public function setLastnameUser($lastnameUser)
    {
        $this->lastnameUser = $lastnameUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstnameUser()
    {
        return $this->firstnameUser;
    }

    /**
     * @param mixed $firstname_user
     * @return User
     */
    public function setFirstnameUser($firstnameUser)
    {
        $this->firstnameUser = $firstnameUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailUser()
    {
        return $this->emailUser;
    }

    /**
     * @param mixed $email_user
     * @return User
     */
    public function setEmailUser($emailUser)
    {
        $this->emailUser = $emailUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLoginUser()
    {
        return $this->loginUser;
    }

    /**
     * @param mixed $login_user
     * @return User
     */
    public function setLoginUser($loginUser)
    {
        $this->loginUser = $loginUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPasswordUser()
    {
        return $this->passwordUser;
    }

    /**
     * @param mixed $password_user
     * @return User
     */
    public function setPasswordUser($passwordUser)
    {
        $this->passwordUser = $passwordUser;
        return $this;
    }

    /**
     * @return bool
     */
    public function getRoleUser()
    {
        return $this->roleUser;
    }

    /**
     * @param bool $role_user
     * @return User
     */
    public function setRoleUser(bool $roleUser)
    {
        $this->roleUser = $roleUser;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDateCreateUser()
    {
        return $this->dateCreateUser;
    }

    /**
     * @param string $dateCreate_user
     * @return User
     */
    public function setDateCreateUser(string $dateCreateUser)
    {
        $this->dateCreateUser = $dateCreateUser;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateUpdateUser()
    {
        return $this->dateUpdateUser;
    }

    /**
     * @param string $dateUpdate_user
     * @return User
     */
    public function setDateUpdateUser(string $dateUpdateUser)
    {
        $this->dateUpdateUser = $dateUpdateUser;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsActiveUserUser()
    {
        return $this->isActiveUserUser;
    }

    /**
     * @param bool $isActiveUser_user
     * @return User
     */
    public function setIsActiveUserUser(bool $isActiveUserUser)
    {
        $this->isActiveUserUser = $isActiveUserUser;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsActiveAdminUser()
    {
        return $this->isActiveAdminUser;
    }

    /**
     * @param bool $isActiveAdmin_user
     * @return User
     */
    public function setIsActiveAdminUser(bool $isActiveAdminUser)
    {
        $this->isActiveAdminUser = $isActiveAdminUser;
        return $this;
    }

     /**
     * @return string
     */
    public function getTokenNewPassUser()
    {
        return $this->tokenNewPassUser;
    }

    /**
     * @param string $tokenNewPass_user
     * @return User
     */
    public function setTokenNewPassUser(string $tokenNewPassUser)
    {
        $this->tokenNewPassUser = $tokenNewPassUser;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateNewPassUser()
    {
        return $this->dateNewPassUser;
    }

    /**
     * @param string $dateNewPass_user
     * @return User
     */
    public function setDateNewPassUser(string $dateNewPassUser)
    {
        $this->dateNewPassUser = $dateNewPassUser;
        return $this;
    }
}
