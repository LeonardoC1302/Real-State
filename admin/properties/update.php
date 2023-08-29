<?php
    use App\Property;
    require '../../includes/app.php';
    isAuth();

    // Validate ID
    $id = $_GET['id'] ?? null;
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id) {
        header('Location: /admin');
    }

    // Get property
    $property = Property::find($id);

    //Get sellers
    $query = "SELECT * FROM sellers";
    $result = mysqli_query($db, $query);

    // Form Validation
    $errors = [];

    // Execute after form is submitted
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize inputs
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $rooms = mysqli_real_escape_string($db, $_POST['rooms']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $parking = mysqli_real_escape_string($db, $_POST['parking']);
        $seller_id = mysqli_real_escape_string($db, $_POST['seller']);
        $created = date('Y/m/d');

        // Files
        $image = $_FILES['image'];

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

        // Validate image size (200Kb max)
        $maxSize = 1000 * 200;
        if($image['size'] > $maxSize) {
            $errors[] = "The image is too large. Max size: 100Kb";
        }

        // Insert if there are no errors
        if(empty($errors)){
            // Create folder
            $imageDirectory = '../../images/';
            if(!is_dir($imageDirectory)) {
                mkdir($imageDirectory);
            }
            
            $imageName = '';
            if($image['name']) {
                // Delete previous image
                unlink($imageDirectory . $property['image']);
                // Generate a unique name
                $imageName = md5(uniqid(rand(), true)) . '.jpg';
                // Upload image
                move_uploaded_file($image['tmp_name'], $imageDirectory . $imageName);
            } else {
                $imageName = $property['image'];
            }

            // Insert
            $query = "UPDATE properties SET title='$title', price='$price', image='$imageName', description='$description', rooms=$rooms, wc=$wc, parking=$parking, seller_id='$seller_id' WHERE id = $id";

            $result = mysqli_query($db, $query);

            if($result) {
                // Redirect to admin
                header('Location: /admin?result=2');
            }
        }
    }

    includeTemplate('header');
?>

    <main class="container section">
        <h1>Update</h1>
        <a href="/admin" class="button green-button">Go Back</a>

        <?php
        foreach($errors as $error) : ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="form" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/properties_form.php'; ?>
            <input type="submit" value="Update Property" class="button green-button">
        </form>

    </main>

    
<?php
    includeTemplate('footer');
?>