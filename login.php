<?php

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['login_btn']) && !empty($_POST['login_btn'])){
            $email = $_POST['u_email'];
            $password = $_POST['u_pass'];
            if(!empty($email) or !empty($password))
            {
                $email = $User->checkInput($email);
                $password = $User->checkInput($password);

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error = "iNVALID FORMAT";
                }else
                {
                    if($getFromU->login($email, $password) === false)
                    {
                        $error = "The email or passord is incorrect";
                    }
                }

            }
        else{
            $error = "Please enter username and password!";
        }
        }
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="assets/bootstrap/js/jquery-3.4.0.js"></script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
</head>
<body>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3 class="text-info text-center my-5 pt-5">Login Here</h3>
        <form method="post">
            <input type="email" placeholder="Enter email" name="u_email" class="form-control" required><br><br>
            <input type="password" placeholder="Enter password" name="u_pass" class="form-control" required><br><br>
            <input type="submit" value="Login" name="login_btn" class="btn btn-outline-primary btn-block"><br><br>
            <p class="text-center">Don't Have an Account? <a href="register.php" class="btn btn-outline-primary ml-2">Register</a></p>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
</body>
</html>