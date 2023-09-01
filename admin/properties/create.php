<?php
    require '../../includes/app.php';
    use App\Property;
    use App\Seller;

    use Intervention\Image\ImageManagerStatic as Image;

    isAuth();
    $property = new Property;

    //Get sellers
    $sellers = Seller::all();

    // Form Validation
    $errors = Property::getErrors();

    // Execute after form is submitted
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $property = new Property($_POST['property']);
        // Generate a unique name
        $imageName = md5(uniqid(rand(), true)) . '.jpg';
        // Resize image
        if($_FILES['property']['tmp_name']['image']){
            $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
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
            $property->save();
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
            <?php include '../../includes/templates/properties_form.php'; ?>
            <input type="submit" value="Create Property" class="button green-button">
        </form>

    </main>

    
<?php
    includeTemplate('footer');
?>