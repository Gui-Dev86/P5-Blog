<?php

namespace App\Manager;

use App\controllers\DatabaseController;
use App\models\User;

/**
 * LoginManager for Users
 */
class LoginManager extends Database
{

    /**
     * Register user
     *
     */
    public function registerUser($lastname_user, $firstname_user, $login_user, $email_user, $password_user )
    {
        $hashedpassword = password_hash($password_user, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users SET lastname_user = :lastname_user, firstname_user = :firstname_user, email_user = :email_user, 
        login_user = :login_user, password_user = :password_user,  role_user = 1, statut_user = 1, isActiveUser_user = 1, isActiveAdmin_user = 1';
        $parameters = [
            ':lastname_user' =>$lastname_user,
            ':firstname_user' =>$firstname_user,
            ':email' => $email_user,
            ':login_user' =>$login_user,
            ':password_user' => $hashedpassword
        ];
        $this->sql($sql, $parameters);
    }
}