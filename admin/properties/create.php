<?php
    require '../../includes/config/database.php';
    $db = connect_db();

    //Get sellers
    $query = "SELECT * FROM sellers";
    $result = mysqli_query($db, $query);

    // Form Validation
    $errors = [];
    $title = '';
    $price = '';
    $description = '';
    $rooms = '';
    $wc = '';
    $parking = '';
    $seller_id = '';

    // Execute after form is submitted
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $rooms = $_POST['rooms'];
        $wc = $_POST['wc'];
        $parking = $_POST['parking'];
        $seller_id = $_POST['seller'];
        $created = date('Y/m/d');

        if(!$title) {
            $errors[] = "The title is mandatory";
        }
        if(!$price) {
            $errors[] = "The price is mandatory";
        }
        if(strlen($description) < 25) {
            $errors[] = "The description is mandatory and must be at least 25 characters";
        }
        if(!$rooms) {
            $errors[] = "The room quantity is mandatory";
        }
        if(!$wc) {
            $errors[] = "The bathroom quantity is mandatory";
        }
        if(!$parking) {
            $errors[] = "The parking quantity is mandatory";
        }
        if(!$seller_id) {
            $errors[] = "The seller is mandatory";
        }

        // Insert if there are no errors
        if(empty($errors)){
            // Insert
            $query = "INSERT INTO properties (title, price, description, rooms, wc, parking, created, seller_id) VALUES ('$title', '$price', '$description', '$rooms', '$wc', '$parking', '$created', '$seller_id')";
            $result = mysqli_query($db, $query);

            if($result) {
                // Redirect to admin
                header('Location: /admin');
            }
        }
    }

    require '../../includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Create</h1>
        <a href="/admin" class="button green-button">Go Back</a>

        <?php
        foreach($errors as $error) : ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="form" method="POST" action="/admin/properties/create.php">
            <fieldset>
                <legend>General Information</legend>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Property Title" value="<?php echo $title ?>">

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" placeholder="Property Price" min=1 value="<?php echo $price ?>">

                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/jpeg, image/png">

                <label for="description">Description:</label>
                <textarea id="description" name="description" value="<?php echo $description ?>"></textarea>
            </fieldset>

            <fieldset>
                <legend>Property Information</legend>
                <label for="rooms">Rooms:</label>
                <input type="number" id="rooms" name="rooms" placeholder="Eg. 3" min=1 max=9 value="<?php echo $rooms ?>">

                <label for="wc">Bathrooms:</label>
                <input type="number" id="wc" name="wc" placeholder="Eg. 3" min=1 max=9 value="<?php echo $wc ?>">

                <label for="parking">Parking:</label>
                <input type="number" id="parking" name="parking" placeholder="Eg. 3" min=1 max=9 value="<?php echo $parking ?>">
            </fieldset>

            <fieldset>
                <legend>Seller</legend>
                <select name="seller">
                    <option value="" disabled selected>-- Select a Seller --</option>
                    <?php while( $seller = mysqli_fetch_assoc($result) ):?>
                        <option <?php echo $seller_id === $seller['id'] ? 'selected' : ''; ?> value="<?php echo $seller['id']; ?>"><?php echo $seller['name'] . " " . $seller['lastName']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>
            <input type="submit" value="Create Property" class="button green-button">
        </form>

    </main>

    
<?php
    includeTemplate('footer');
?>