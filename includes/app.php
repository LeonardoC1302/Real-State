<?php
require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Inlude classes
$db = connect_db();

use App\ActiveRecord;
ActiveRecord::setDB($db);