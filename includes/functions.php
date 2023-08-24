<?php
// require 'app.php';

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . 'functions.php');

function includeTemplate(string $name, bool $start=false){
    include TEMPLATES_URL . "/{$name}.php";
}

function isAuth(){
    session_start();
    $auth = $_SESSION['login'] ?? false;
    if($auth) {
        return true;
    }
    return false;
}