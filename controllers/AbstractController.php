<?php

namespace App\controllers;


abstract class Controller{
    /**
     * Afficher une vue
     *
     * @param string $fichier
     * @param array $data
     * @return void
     */
    public function render(string $fichier, array $data = []){
        extract($data);

        // On démarre le buffer de sortie
        ob_start();

        // On génère la vue
        if( file_exists( 'views/'.$fichier.'.php' ) ) {
            require_once(ROOT.'views/'.$fichier.'.php');
        } else {
            require_once(ROOT.'views/back/'.$fichier.'.php');
        }

        // On stocke le contenu dans $content
        $content = ob_get_clean();

        // On fabrique le "template"
        require_once(ROOT.'views/layout/base.php');
    }

    /**
     * Permet de charger un modèle
     *
     * @param string $model
     * @return void
     */
    public function loadModel(string $model){
        // On va chercher le fichier correspondant au modèle souhaité
        require_once(ROOT.'models/'.$model.'.php');
        
        // On crée une instance de ce modèle. Ainsi "Article" sera accessible par $this->Article
        $this->$model = new $model();
    }
}