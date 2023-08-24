<?php
    require './includes/app.php';
    includeTemplate('header');
?>

    <main class="container section">
        <section class="section container">
            <h2>Houses and Departments On Sale</h2>
            <?php
                include 'includes/templates/announcements.php';
            ?>
    </main>

    
<?php
    includeTemplate('footer');
?>