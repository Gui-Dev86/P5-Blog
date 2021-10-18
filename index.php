<?php

use App\src\controllers\Main;

if(!isset($_SESSION)) {
    session_start();
}

// On génère une constante contenant le chemin vers la racine publique du projet
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
define('local', 'http://localhost/P5_Blog/');
// On appelle le modèle et le contrôleur principaux
require(ROOT."src/controllers/AbstractController.php");
require(ROOT."src/models/abstractManager.php");
require(ROOT."vendor/autoload.php");

// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', $_GET['p']);

//save the third parameter in the URL for the token and id Article
if(isset($params[2])) {
    if($params[2] != "") {
        $_SESSION['paramURL'] = $params[2];
    }
}
//save the second parameter in the URL for the comments pagination
if(isset($params[3])) {
    if(is_numeric($params[3])) {
        $_SESSION['commentPage'] = $params[3];
    }
}

//save the third parameter in the URL to recover the comment ID
if(isset($params[4])) {
    if(is_numeric($params[4])) {
        $_SESSION['idCommentPage'] = $params[4];
    }
}

// Si au moins 1 paramètre existe
if($params[0] != ""){

    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);

    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';
    
    $class = 'app\src\controllers\\'.$controller;
    // On appelle le contrôleur
    require_once(ROOT.'src/controllers/'.$controller.'Controller.php');
   
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
    require_once(ROOT.'src/controllers/MainController.php');
    
    // On instancie le contrôleur
    $controller = new Main();
    
    // On appelle la méthode home
    $controller->home();
}