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
     * Create user
     *
     */
    public function createUser(User $user)
    {

        $sql = 'INSERT INTO users (lastname_user,firstname_user,email_user,login_user,password_user,role_user,dateCreate_user,dateUpdate_user,isActiveUser_user,isActiveAdmin_user)
        VALUES (:lastname_user,:firstname_user,:email_user,:login_user,:password_user,1,:dateCreate_user,:dateUpdate_user,1,1)';
        
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
        $sql = 'SELECT COUNT(*) AS nbLogin FROM users WHERE login_user = :login_user OR email_user = :email_user';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('login_user',$user->getLogin_user(), PDO::PARAM_STR);
        $query->bindValue('email_user',$user->getEmail_user(), PDO::PARAM_STR);
        $query->execute();
        $dataCount = $query->fetch(PDO::FETCH_ASSOC);
        return $dataCount;
    }
}