<?php

namespace App\src\models;

use PDO;

/**
 * UserManager for Users 
 */
class UserManager extends AbstractManager {

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "userManager";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    /**
     * Update the user's datas
     *
     */
    public function updateUser(User $user)
    {
        $sql = 'UPDATE users SET firstname_user = :firstname_user, lastname_user = :lastname_user, login_user = :login_user, email_user = :email_user
        WHERE id_user = :id_user';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('firstname_user',$user->getFirstname_user(), PDO::PARAM_STR);
        $query->bindValue('lastname_user',$user->getLastname_user(), PDO::PARAM_STR);
        $query->bindValue('login_user',$user->getLogin_user(), PDO::PARAM_STR);
        $query->bindValue('email_user',$user->getEmail_user(), PDO::PARAM_STR);
        $query->bindValue('id_user',$user->getId_user(), PDO::PARAM_INT);
        $data = $query->execute();
        return $data;
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
     * Checks login and mail availables
     *
     */
    public function loginMailAvailable(User $user)
    {
        $sql = 'SELECT COUNT(*) AS nbLoginMail FROM users WHERE id_user != :id_user AND (login_user = :login_user OR email_user = :email_user)';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('id_user',$user->getId_user(), PDO::PARAM_STR);
        $query->bindValue('login_user',$user->getLogin_user(), PDO::PARAM_STR);
        $query->bindValue('email_user',$user->getEmail_user(), PDO::PARAM_STR);
        $query->execute();
        $dataCount = $query->fetch(PDO::FETCH_ASSOC);
        return $dataCount;
    }

    /**
     * Update the user's password
     *
     */
    public function updatePassword(User $user)
    {
        $sql = 'UPDATE users SET password_user = :password_user WHERE login_user = :login_user';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('password_user',$user->getPassword_user(), PDO::PARAM_STR);
        $query->bindValue('login_user',$user->getLogin_user(), PDO::PARAM_STR);
        $data = $query->execute();
        return $data;
    }

    /**
     * Update the status to pass in active 
     *
     */
    public function activeStatusUser(User $user)
    {
        $sql = 'UPDATE users SET isActiveUser_user = 1 WHERE login_user = :login_user';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('login_user',$user->getLogin_user(), PDO::PARAM_STR);
        $data = $query->execute();
        return $data;
    }

    /**
     * Update the status to pass in disable
     *
     */
    public function disableStatusUser(User $user)
    {
        $sql = 'UPDATE users SET isActiveUser_user = 0 WHERE login_user = :login_user';
        $query = $this->_connexion->prepare($sql);
        
        $query->bindValue('login_user',$user->getLogin_user(), PDO::PARAM_STR);
        $data = $query->execute();
        return $data;
    }
}