<?php

namespace App\src\controllers;

class MainController extends AbstractController{

    public function home(){
        $this->render('home');
    }
}