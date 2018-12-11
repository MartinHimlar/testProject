<?php
session_start();
mb_internal_encoding("UTF-8");
spl_autoload_register("autoload");
Database::connect('localhost','root','','guestbook');

isset($_SESSION['token']) ? : $_SESSION['token'] = NULL;
isset($_SESSION['flashMessages']) ? : $_SESSION['flashMessages'] = NULL;


function autoload($class)
{
    if (preg_match('/Controller$/', $class))
        require("controller/" . $class . ".php");
    else
        require("model/" . $class . ".php");
}

$uri = $_SERVER['REQUEST_URI'];

if ((preg_match('#^/api#i', $uri) === 1)) {
    $api = new apiController();
    $api->render(array($uri));
} else {
    $router = new routerController();
    $router->action(array($uri));
    $router->render();
}