<?php
    require '../../includes/app.php';
    use App\Property;
    use Intervention\Image\ImageManagerStatic as Image;

    isAuth();
    $db = connect_db();

    //Get sellers
    $query = "SELECT * FROM sellers";
    $result = mysqli_query($db, $query);

    // Form Validation
    $errors = Property::getErrors();
    $title = '';
    $price = '';
    $description = '';
    $rooms = '';
    $wc = '';
    $parking = '';
    $seller_id = '';

    // Execute after form is submitted
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $property = new Property($_POST);
        // Generate a unique name
        $imageName = md5(uniqid(rand(), true)) . '.jpg';
        // Resize image
        if($_FILES['image']['tmp_name']){
            $image = Image::make($_FILES['image']['tmp_name'])->fit(800, 600);
            $property->setImage($imageName);
        }

        $errors = $property->validate();
        
        // Insert if there are no errors
        if(empty($errors)){
            // Save image
            // Create folder
            if(!is_dir(IMAGES_DIR)) {
                mkdir(IMAGES_DIR);
            }
            $image->save(IMAGES_DIR . $imageName);
            $result = $property->save();
            if($result) {
                // Redirect to admin
                header('Location: /admin?result=1');
            }
        }
    }

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

        <form class="form" method="POST" action="/admin/properties/create.php" enctype="multipart/form-data">
            <fieldset>
                <legend>General Information</legend>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Property Title" value="<?php echo $title ?>">

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" placeholder="Property Price" min=1 value="<?php echo $price ?>">

                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/jpeg, image/png">

                <label for="description">Description:</label>
                <textarea id="description" name="description"><?php echo $description ?></textarea>
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
                <select name="seller_id">
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