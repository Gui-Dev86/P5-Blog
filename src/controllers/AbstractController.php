<?php

namespace App\src\controllers;

abstract class AbstractController {
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
        if( file_exists( 'src/views/'.$fichier.'.php' ) ) {
            require_once(ROOT.'src/views/'.$fichier.'.php');
        } else {
            require_once(ROOT.'src/views/back/'.$fichier.'.php');
        }

        // On stocke le contenu dans $content
        $content = ob_get_clean();

        // On fabrique le "template"
        require_once(ROOT.'src/views/layout/base.php');
    }

    /**
     * Permet de charger un modèle
     *
     * @param string $model
     * @return void
     */
    public function loadModel($model){   
        // On va chercher le fichier correspondant au modèle souhaité
        require_once(ROOT.'src/models/'.$model.'.php');
        $this->$model = new $model();
    }
}