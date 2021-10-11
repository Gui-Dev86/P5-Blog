<?php

namespace App\src\controllers;

class adminManagement extends AbstractController {

    /**
     * This method displays the admin dashboard
     *
     * @return void
     */
    public function index(){
        if($this->isLogged() == false OR $this->isAdmin() == false) {
            header('Location: ' . local);
            exit;
        } else {
        // On envoie les données à la vue index
            $this->render('adminManagement');
        }
    }

    /**
     * This method displays the articles list
     *
     * @return void
     */
    public function adminListAllArticles(){
        if($this->isLogged() == false OR $this->isAdmin() == false) {
            header('Location: ' . local);
            exit;
        } else {
        // On envoie les données à la vue index
            $this->render('adminListAllArticles');
        }
    }

    /**
     * This method displays the comments list
     *
     * @return void
     */
    public function adminListAllComments(){
        if($this->isLogged() == false OR $this->isAdmin() == false) {
            header('Location: ' . local);
            exit;
        } else {
        // On envoie les données à la vue index
            $this->render('adminListAllComments');
        }
    }

    /**
     * This method displays the members list
     *
     * @return void
     */
    public function adminListAllMembers(){
        if($this->isLogged() == false OR $this->isAdmin() == false) {
            header('Location: ' . local);
            exit;
        } else {
        // On envoie les données à la vue index
            $this->render('adminListAllMembers');
        }
    }

    /**
     * This method displays the modify user page
     *
     * @return void
     */
    public function adminModifyUser(){
        if($this->isLogged() == false OR $this->isAdmin() == false) {
            header('Location: ' . local);
            exit;
        } else {
        // On envoie les données à la vue index
            $this->render('adminModifyUser');
        }
    }
}