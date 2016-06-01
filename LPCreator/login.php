<?php
/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/27/2016
 * Time: 9:02 AM
 */

session_start();

// http://stackoverflow.com/questions/15798918/what-is-the-best-method-to-prevent-a-brute-force-attack

?>

<?php
//session_start();
//
//if(isset($_SESSION['signed_in'])) {
//
//} else {
//    header('Location: http://google.com/');
//}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

    <title>Landing Page Creator | Developed by Radley Anaya</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <link href="css/styles.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" id="nav-bar">

    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png" class="img-responsive">

            </a>
        </div>
        <p class="navbar-text navbar-right pad-right">
            <a href="#" class="navbar-link">
            </a> <!-- $_SESSION['username']; -->
        </p>
    </div>
</nav>

<div class="container">

        <form id="login-form" action="includes/connect_db.php" method="POST">
            <div class="form-group">
                <label for="email" class="sr-only">Email:</label>
                <input id="email" name="email" type="text" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password" class="sr-only">Password:</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button id="login_btn" type="submit" class="btn btn-md btn-primary">Login</button>
            </div>
            <?php
            if(isset($_SESSION['message'])) {

            ?>
                <div class="alert alert-warning" role="alert"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
            <?php

            }

            ?>
        </form>

</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/login.js"></script>


<!-- wysiwyg -->


</body>
</html>

