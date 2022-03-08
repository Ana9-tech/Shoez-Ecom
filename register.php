<?php

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['register_btn'])){
            // call method addToUser
            $User->addToUser($_POST['user_id']);
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
    <title>Register</title>
    <script src="assets/bootstrap/js/jquery-3.4.0.js"></script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
</head>
<body>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 ">
        <h1 class="text-success text-center my-5 pt-5">Register Here</h1>
        <form method="post">
               <input type="text" placeholder="Enter first name" name="u_fname" class="form-control" required><br><br>
               <input type="text" placeholder="Enter last name" name="u_lname" class="form-control" required><br><br>
               <input type="email" placeholder="Enter email" name="u_email" class="form-control" required><br><br>
               <input type="password" placeholder="Enter password" name="u_pass" class="form-control" required><br><br>
               <input type="submit" value="Register" name="register_btn" class="btn btn-outline-success btn-block"><br><br>
               <p class="text-center">Already have an account? <a href="login.php" class="btn btn-outline-success ml-2">Log in</a></p>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
</body>
</html>