<?php
function connect_db() : mysqli {
    $db = new mysqli('localhost', 'root', '123', 'realstate_crud');
    if(!$db) {
        echo "Error connecting to database";
        exit;
    }

    return $db;
}