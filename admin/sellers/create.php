<?php
    require '../../includes/app.php';

    use App\Seller;
    isAuth();

    $seller = new Seller;
    $errors = Seller::getErrors();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $seller = new Seller($_POST['seller']);
        $errors = $seller->validate();
        if(empty($errors)){
            $seller->save();
        }
    }

includeTemplate('header');
?>


<main class="container section">
    <h1>Register Seller</h1>
    <a href="/admin" class="button green-button">Go Back</a>

    <?php
    foreach($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="/admin/sellers/create.php">
        <?php include '../../includes/templates/sellers_form.php'; ?>
        <input type="submit" value="Register Seller" class="button green-button">
    </form>

</main>

<?php
    includeTemplate('footer');
?>