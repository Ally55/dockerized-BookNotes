<?php

require __DIR__ . '/../flash_message.php';

if (isAuthenticated()) {
    header('Location:/library');
    exit;
}

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $errors = validateInput();
//
//    $email = $_POST['email'];
//    $username = $_POST['username'];
//    if(empty($username)) {
//        $errors[] = 'Please enter a username.';
//    }
//    if(strlen($username) < 3) {
//        $errors[] = 'Your username is too short.';
//    }
//    if(!preg_match('/^[a-zA-Z]+[a-zA-Z0-9]*$/',$username)) {
//        $errors[] = 'Your username must begin with a letter.';
//    }
//
//    $password = $_POST['password'];
//    $confirmPassword = $_POST['confirm_password'];
//    $hashPassword = '';
//    if($password === $confirmPassword) {
//        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
//    } else {
//        $errors[] = 'The passwords do not match.';
//    }
//
//    if ($query->findUserByEmail($email)) {
//        $errors[] = 'This email is already registered.';
//    } elseif (count($errors) === 0) {
//        $data = [
//            'username' => $username,
//            'email' => $email,
//            'password' => $hashPassword
//        ];
//        $query->insertUser($data);
//        if (isset($_POST['username'])) {
//            $_SESSION['username'] = $_POST['username'];
//            $_SESSION['message'] = 'You have been successfully registered on our site! Enjoy!';
//        }
//        header('Location:/login');
//        exit;
//    }
//}

?>

<div class="container-fluid background-div p-0">

    <?php include(__DIR__ . "/header.php"); ?>


    <div class="row no-gutters text-center mt-5">
        <div class="col">
            <h1 class="signup-title">Create a new account</h1>
        </div>
    </div>

<?php if(!empty($errors)) { ?>
    <div class="row d-flex align-items-center justify-content-center no-gutters">
        <div class="col alert alert-danger mt-4 error-message" role="alert">
            <ul class="error-list pl-3">
                <?php foreach($errors as $error) { ?>
                <li> <?php echo htmlspecialchars($error, ENT_QUOTES);?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php } ?>

    <div class="row mt-3 no-gutters">
        <div class="col-10 col-md-7 col-lg-5 col-xl-4 p-2 mx-auto">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="label-form">Email address</label>
                    <input type="email" name="email" class="form-control input-form" id="exampleInputEmail1"
                           aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="username" class="label-form">Username</label>
                    <input type="text" name="username" class="form-control input-form" id="username">
                </div>
                <div class="form-group">
                    <label for="password" class="label-form">Password</label>
                    <input type="password" name="password" class="form-control input-form" id="password">
                </div>
                <div class="form-group mb-5">
                    <label for="confirm_password" class="label-form">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control input-form" id="confirm_password">
                </div>
                <button type="submit" class="btn btn-primary signup-button mt-1 ">SIGN UP</button>
            </form>
        </div>
    </div>

</div>