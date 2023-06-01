<?php
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id) {
        header('Location: /');
    }

    require 'includes/config/database.php';
    $db = connect_db();

    $query = "SELECT * FROM properties WHERE id = $id";
    $result = mysqli_query($db, $query);
    if(!$result->num_rows) {
        header('Location: /');
    }

    $property = mysqli_fetch_assoc($result);

    require './includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section centered-content">
        <h1><?php echo $property['title']?></h1>

        <img loading="lazy" src="/images/<?php echo $property['image']?>" alt="Property Image">

        <div class="property-info">
            <p class="price">$<?php echo $property['price']?></p>
            <ul class="icons-stats">
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                    <p><?php echo $property['wc']?></p>
                </li>
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                    <p><?php echo $property['parking']?></p>
                </li>
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                    <p><?php echo $property['rooms']?></p>
                </li>
            </ul>
            <p>
                <?php echo $property['description']?>
            </p>
        </div>
    </main>

    
<?php
    mysqli_close($db);
    includeTemplate('footer');
?>