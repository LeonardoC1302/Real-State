<?php
    require './includes/config/database.php';
    $db = connect_db();

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $errors[] = 'The email is invalid';
        }
        if(!$password) {
            $errors[] = 'The password is invalid';
        }
        if(empty($errors)){
            // Check if user exists
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($db, $query);

            if($result->num_rows){
                // Check password
                $user = mysqli_fetch_assoc($result);
                $auth = password_verify($password, $user['password']); // Checks with hashed password
                if($auth){
                    // Start session
                    session_start();
                    $_SESSION['user'] = $user['email'];
                    $_SESSION['login'] = true;
                    header('Location: /admin');
                } else {
                    $errors[] = 'The password is incorrect';
                }

            } else {
                $errors[] = 'The user does not exist';
            }
        }
    }
    // Include header
    require './includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section centered-content">
        <h1>Log In</h1>

        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="form">
        <fieldset>
                <legend>Email & Password</legend>
                <label for="email">E-Mail</label>
                <input type="email" name= "email" placeholder="Your E-Mail" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Your Password" id="password" required>
            </fieldset>
            <input type="submit" value="Log In" class="button green-button">
        </form>
    </main>

    
<?php
    includeTemplate('footer');
?>