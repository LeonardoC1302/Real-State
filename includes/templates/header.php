<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real State</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $start ? 'start' : ''; ?>">
        <div class="container header-content">
            <div class="bar">
                <a href="/index.php">
                    <img src="/build/img/logo.svg" alt="Real State Logo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Menu Icon">
                </div>
                <div class="right">
                    <img src="/build/img/dark-mode.svg" alt="Dark Mode Img" class="dark-mode-button">
                    <nav class="navigation">
                        <a href="/aboutUs.php">About Us</a>
                        <a href="/announcements.php">Announcements</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contact.php">Contact</a>
                        <?php if($auth){ ?>
                            <a href="/logout.php">Log Out</a>
                        <?php } else { ?>
                            <a href="/login.php">Log In</a>
                        <?php } ?>
                    </nav>
                </div>
            </div>
            <?php if($start) { ?>
                <h1>Sale of Exclusive Luxury Houses and Apartments</h1>
            <?php } ?> 
        </div>
    </header>