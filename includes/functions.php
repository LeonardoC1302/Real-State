<?php
require 'app.php';

function includeTemplate(string $name, bool $start=false){
    include TEMPLATES_URL . "/{$name}.php";
}
