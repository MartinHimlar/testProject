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

$router = new routerController();
$router->action(array($_SERVER['REQUEST_URI']));
$router->render();