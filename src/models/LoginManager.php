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
    public function createUser($lastname_user, $firstname_user, $email_user, $login_user, $password_user)
    {
        $hashedpassword = password_hash($password_user, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (lastname_user,firstname_user,email_user,login_user,password_user, role_user,statut_user,isActiveUser_user,isActiveAdmin_user)
        VALUES (:lastname_user,:firstname_user,:email_user,:login_user,:password_user,1,1,1,1)";
        
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('lastname_user',$lastname_user, PDO::PARAM_STR);
        $query->bindValue('firstname_user',$firstname_user, PDO::PARAM_STR);
        $query->bindValue('email_user',$email_user, PDO::PARAM_STR);
        $query->bindValue('login_user',$login_user, PDO::PARAM_STR);
        $query->bindValue('password_user',$hashedpassword, PDO::PARAM_STR);
        $query->execute();
        var_dump($query->execute());
    }
}