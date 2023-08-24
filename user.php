<?php
require 'includes/config/app.php';
$db = connect_db();

// Create an user
$email = "email@email.com";
$password = "123456";
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Query
$query = "INSERT INTO users (email, password) VALUES ('$email', '$passwordHash')";
mysqli_query($db, $query);