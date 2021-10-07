<?php

namespace App\src\models;

use PDO;

/**
 * LoginManager for Users 
 */
class LoginManager extends AbstractManager {

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "loginManager";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    /**
     * Read the informations for a user
     *
     */
    public function readUser(User $user)
    {

        $sql = 'SELECT * FROM users WHERE login_user = :login_user';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('login_user',$user->getLogin_user(), PDO::PARAM_STR);
        $query->execute();
        $dataUser = $query->fetch(PDO::FETCH_ASSOC);
        return $dataUser;
    } 

    /**
     * Create user
     *
     */
    public function createUser(User $user)
    {

        $sql = 'SELECT * FROM users WHERE login_user = :login_user';
        
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('lastname_user',$user->getLastname_user(), PDO::PARAM_STR);
        $query->bindValue('firstname_user',$user->getFirstname_user(), PDO::PARAM_STR);
        $query->bindValue('email_user',$user->getEmail_user(), PDO::PARAM_STR);
        $query->bindValue('login_user',$user->getLogin_user(), PDO::PARAM_STR);
        $query->bindValue('password_user',$user->getPassword_user(), PDO::PARAM_STR);
        $query->bindValue('dateCreate_user',$user->getDateCreate_user(), PDO::PARAM_STR);
        $query->bindValue('dateUpdate_user',$user->getDateUpdate_user(), PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Checks login available
     *
     */
    public function loginAvailable(User $user)
    {
        $sql = 'SELECT COUNT(*) AS nbLogin FROM users WHERE login_user = :login_user';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('login_user',$user->getLogin_user(), PDO::PARAM_STR);
        $query->execute();
        $dataCount = $query->fetch(PDO::FETCH_ASSOC);
        return $dataCount;
    }

    /**
     * Checks email available
     *
     */
    public function emailAvailable(User $user)
    {
        $sql = 'SELECT COUNT(*) AS nbEmail FROM users WHERE email_user = :email_user';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('email_user',$user->getEmail_user(), PDO::PARAM_STR);
        $query->execute();
        $dataCount = $query->fetch(PDO::FETCH_ASSOC);
        return $dataCount;
    }

    /**
     * Create token to recover mail
     *
     */
    public function insertToken(User $user)
    {
        $sql = 'UPDATE users SET tokenNewPass_user = :tokenNewPass_user, dateNewPass_user = :dateNewPass_user WHERE email_user = :email_user';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('tokenNewPass_user',$user->getTokenNewPass_user(), PDO::PARAM_STR);
        $query->bindValue('dateNewPass_user',$user->getDateNewPass_user(), PDO::PARAM_STR);
        $query->bindValue('email_user',$user->getEmail_user(), PDO::PARAM_STR);
        $data = $query->execute();    
        return $data;
    }

    /**
     * Change the password
     *
     */
    public function newPass($newHashedpassword, $token, $dateNewPass)
    {
        $sql = 'UPDATE users SET password_user = :password_user, dateNewPass_user = :dateNewPass_user WHERE tokenNewPass_user = :tokenNewPass';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('password_user_user',$newHashedpassword, PDO::PARAM_STR);
        $query->bindValue('tokenNewPass_user',$token, PDO::PARAM_STR);
        $query->bindValue('dateNewPass_user',$dateNewPass, PDO::PARAM_STR);
        $query->bindValue('email_user',$user->getEmail_user(), PDO::PARAM_STR);
        $data = $query->execute();    
        return $data;
    }
    
}