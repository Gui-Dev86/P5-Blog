<?php

namespace app\src\controllers;

class MentionsLegales extends Controller{

    /**
     * This method displays the legals mentions
     *
     * @return void
     */
    public function index(){
    
        $this->render('mentionsLegales');
    }

}