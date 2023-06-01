<?php
require 'app.php';

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