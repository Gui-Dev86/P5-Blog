<?php

namespace App\src\controllers;

class MentionsLegales extends AbstractController{

    /**
     * This method displays the legals mentions
     *
     * @return void
     */
    public function index(){
    
        $this->render('mentionsLegales');
    }
}
