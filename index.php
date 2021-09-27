<?php

namespace App;

use App\controllers\MainController;

// On génère une constante contenant le chemin vers la racine publique du projet
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
define('local', 'http://localhost/P5_Blog/');
// On appelle le modèle et le contrôleur principaux
require(ROOT."controllers/AbstractController.php");
require(ROOT."models/databaseManager.php");
// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', $_GET['p']);

// Si au moins 1 paramètre existe
if($params[0] != ""){

    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);

    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';
    $class = 'App\controllers\\'.$controller;
    // On appelle le contrôleur
    require_once(ROOT.'controllers/'.$controller.'Controller.php');
   
    // On instancie le contrôleur
    $controller = new $class();
    
    if(method_exists($controller, $action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller,$action], $params);
        // On appelle la méthode
        $controller->$action();
        
    }else{
        // On envoie le code réponse 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
}else{
    // Ici aucun paramètre n'est défini
    // On appelle le contrôleur par défaut
    require_once(ROOT.'controllers/MainController.php');

    // On instancie le contrôleur
    $controller = new MainController();

    // On appelle la méthode home
    $controller->home();
}