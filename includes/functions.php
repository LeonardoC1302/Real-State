<?php
// require 'app.php';

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . 'functions.php');
define('IMAGES_DIR', __DIR__ .  '../images/');

function includeTemplate(string $name, bool $start=false){
    include TEMPLATES_URL . "/{$name}.php";
}

function isAuth(){
    session_start();
    if(!$_SESSION['login']) {
        header('Location: /');
    }
}

function debug($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit;
}

// Sanitize data: Remove HTML tags and spaces
function s($html){
    $s = htmlspecialchars($html);
    return $s;
}