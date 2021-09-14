<?php

namespace App\controllers;

require(ROOT."controllers/AbstractController.php");

class MainController extends Controller{

    public function home(){
        $this->render('home');
    }
}