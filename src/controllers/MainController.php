<?php

namespace app\src\controllers;

class MainController extends Controller{

    public function home(){
        $this->render('home');
    }
}