<?php

namespace app\controllers;

require(ROOT."controllers/AbstractController.php");

class Login extends Controller{

    /**
     * This method displays the login page
     *
     * @return void
     */
    public function index(){
    
        $this->render('login');
    }
    
    /**
     * This method displays the register page
     *
     * @return void
     */
    public function registerUser(){
    
        $this->render('registerUser');
    }
    
    /**
     * This method displays the login page
     *
     * @return void
     */
    public function recupPassword(){
    
        $this->render('recupPassword');
    }

}