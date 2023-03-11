<?php

session_start();
date_default_timezone_get('America/Mexico_City');
require_once "../app/Controller.php";

use App\Config\{Config};

$CONFIG = new Config();

$ROUTE = $CONFIG->ROOT();

$route = str_replace($CONFIG->Route(), "", $_SERVER["REQUEST_URI"]); /* Obtiene la carpeta donde está el proyecto */
$URI_REQUEST = explode("?", $route)[0]; /* Separa los elementos de lauri en $_GET */

$USER_SYSTEM = isset($_SESSION[$CONFIG->sessionName()]) ? $_SESSION[$CONFIG->sessionName()] : false;

/**
 * _____________________________________
 * _________MVC Controller _____________
 * _____________________________________
 */

$DIRECTORY = isset($URI_REQUEST) ? explode('/', $URI_REQUEST) : false;
if ($DIRECTORY) {
    $dir_Array = [];
    foreach ($DIRECTORY as $key => $value) {
        if ($DIRECTORY[$key] != $value) {
            $dir_Array[] = $DIRECTORY[$key];
        }
    }
}

$DIR_SIZE = ($DIRECTORY ? sizeof($DIRECTORY) : 0);

/**
 * _____________________________________
 * _________MVC Controller _____________
 * _____________________________________
 */

/**
 * Root controller
 */
if (!$DIRECTORY) {
    require_once("../views/index/index.view.php");
}

/**
 * Contact controller
 */

/**
 * Store controller
 */

/**
 * Login controller
 */
else if ($DIRECTORY[0] === "login") {
    if (!$USER_SYSTEM) {
        require_once '../routes/login/login.route.php';
    } else {
        header('Location: ' . $ROUTE . 'system/store');
    }
}

/**
 * System controller
 */
else if ($DIRECTORY[0] === 'system') {
    if ($USER_SYSTEM) {
        require_once '../routes/system/system.admin.route.php';
    } else {
        header('Location: ' . $ROUTE . 'login');
    }
}

/**
 * Api Controller
 */
else if($DIRECTORY[0] === 'back' && $_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once '../routes/api/controller.api.php';
}

else{
    require_once '../views/erros/error.view.php';
}
