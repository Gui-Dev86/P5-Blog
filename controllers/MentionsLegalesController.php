<?php

namespace app\controllers;

require(ROOT."controllers/AbstractController.php");

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