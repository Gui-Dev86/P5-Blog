<?php

use App\src\controllers\Main;

if(!isset($_SESSION)) {
    session_start();
}
if(isset($_SERVER['SCRIPT_FILENAME']) && !empty($_SERVER['SCRIPT_FILENAME'])) 
{
    // On génère une constante contenant le chemin vers la racine publique du projet
    define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
}
define('local', 'http://localhost/P5_Blog/');
// On appelle le modèle et le contrôleur principaux
require ROOT."src/controllers/AbstractController.php";
require ROOT."src/models/abstractManager.php";
require ROOT."vendor/autoload.php";

if(isset($_GET['p']) && !empty($_GET['p']))
{
    // On sépare les paramètres et on les met dans le tableau $params
    $params = explode('/', $_GET['p']);
}

// Si au moins 1 paramètre existe
if(isset($_GET['p']) && !empty($_GET['p'])){

    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);

    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';
    
    $class = 'app\src\controllers\\'.$controller;
    // On appelle le contrôleur
    require_once ROOT.'src/controllers/'.$controller.'Controller.php';
   
    // On instancie le contrôleur
    $controller = new $class();
    
    if(method_exists($controller, $action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller,$action], $params);
        
    }else{
        // On envoie le code réponse 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
}else{
    // Ici aucun paramètre n'est défini
    // On appelle le contrôleur par défaut
    require_once ROOT.'src/controllers/MainController.php';
    
    // On instancie le contrôleur
    $controller = new Main();
    
    // On appelle la méthode home
    $controller->home();
}