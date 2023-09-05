<?php
    require '../../includes/app.php';

    use App\Seller;
    isAuth();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    $seller = Seller::find($id);
    $errors = Seller::getErrors();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $args = $_POST['seller'];
        $seller->sync($args);
        $errors = $seller->validate();

        if(empty($errors)){
            $result = $seller->save();
        }
    }

includeTemplate('header');
?>


<main class="container section">
    <h1>Update Seller</h1>
    <a href="/admin" class="button green-button">Go Back</a>

    <?php
    foreach($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST">
        <?php include '../../includes/templates/sellers_form.php'; ?>
        <input type="submit" value="Save Changes" class="button green-button">
    </form>

</main>

<?php
    includeTemplate('footer');
?>