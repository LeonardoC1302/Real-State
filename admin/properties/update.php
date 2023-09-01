<?php
    use App\Property;
    use App\Seller;
    use Intervention\Image\ImageManagerStatic as Image;

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
    $sellers = Seller::all();
    
    // Form Validation
    $errors = Property::getErrors();

    // Execute after form is submitted
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Assign values
        $args = $_POST['property'];
        
        // Update the current property
        $property->sync($args);

        // Sanitize inputs
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $rooms = mysqli_real_escape_string($db, $_POST['rooms']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $parking = mysqli_real_escape_string($db, $_POST['parking']);
        $seller_id = mysqli_real_escape_string($db, $_POST['seller']);
        $created = date('Y/m/d');

        $errors = $property->validate();
        
        // Generate a unique name
        $imageName = md5(uniqid(rand(), true)) . '.jpg';

        if($_FILES['property']['tmp_name']['image']){
            $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
            $property->setImage($imageName);
        }

        // Insert if there are no errors
        if(empty($errors)){
            // Save image on disk
            if($_FILES['property']['tmp_name']['image']){
                // debug(IMAGES_DIR . $imageName);
                $image->save(IMAGES_DIR . $imageName);
            }
            $property->save();
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