<?php
session_start();
include_once 'Config.php';
spl_autoload_register(function ($class) {

    if (strpos($class, "Controller") > 0) {
        if (file_exists("Controller/" . $class . ".php")) {
            include_once "Controller/" . $class . ".php";
        }
    } elseif (file_exists("Model/" . $class . ".php")) {
        include_once "Model/" . $class . ".php";
    } elseif ("Core/" . $class . ".php") {
        include_once "Core/" . $class . ".php";
    } else {
        echo 'Arquivo nao existe !!';
    }
});

$core = new Core();
$core->run();
