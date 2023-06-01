<?php
    require __DIR__ . '/../config/database.php';
    $db = connect_db();
    if($limit == null) {
        $query = "SELECT * FROM properties";
    } else {
        $query = "SELECT * FROM properties LIMIT $limit";
    }
    $result = mysqli_query($db, $query);
?>

<div class="container-announcements">
    <?php while($property = mysqli_fetch_assoc($result)):?>
            <div class="announcement">
                <img loading="lazy" src="/images/<?php echo $property['image']?>" alt="announcement">
                <div class="announcement-content">
                    <h3><?php echo $property['title']?></h3>
                    <p><?php echo $property['description']?></p>
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
                    <a class="yellow-button-block" href="announcement.php?id=<?php echo $property['id']?>">See Property</a>
                </div> <!-- .announcement-content -->
            </div> <!-- .announcement -->
    <?php endwhile; ?>
</div> <!-- .container-announcements -->

<?php
    mysqli_close($db);
?>