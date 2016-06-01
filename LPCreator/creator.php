<?php
session_start();
//
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

} else {
    $_SESSION['message'] = "You have to be logged in to view that page.";
    header('Location: login.php');
}


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
    <link href="css/dashboard-styles.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>

    </style>

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
        <div class="row">
            <div class="col-md-12">
                <h1>The Ultimate Landing Page Creator!</h1>
                <h4>Developed and Designed by Radley Anaya</h4>
                <hr>


            </div>

            <div class="row">
                <div class="col-md-6" id="ajax_form_wrap">


                    <form class="form-horizontal" id="ajax-form">
                        <h3>Page Quantity and SEO Controls</h3>
                        <h5>The <code>&lt;title&gt;</code> and <code>&lt;h1&gt;</code> will contain these words added together. Example: <em>Denver Snow Cones</em></h5>
                        <h6>Note: Put each option on its own line.</h6>
                        <div class="form-group">
                            <label for="option1" class="col-sm-3 control-label">Options 1</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="option1" name="option1"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="option2" class="col-sm-3 control-label">Options 2</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control" id="option2" name="option2"></textarea>
                            </div>
                        </div>

                        <hr>
                        <h3>General Copy</h3>
                        <h6>Note: These controls are HTML Safe</h6>

                        <div class="form-group">
                            <label for="heading_2_first" class="col-sm-3 control-label">First H2</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="heading_2_first" name="heading_2_first">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="heading_2_second" class="col-sm-3 control-label">Second H2</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="heading_2_second" name="heading_2_second">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="para_first" class="col-sm-3 control-label">First P</label>
                            <div class="col-sm-9">
                                <textarea type="text"  class="form-control" id="para_first" name="para_first"></textarea>
                            </div>
                        </div>

                        <hr>
                        <h3>Meta Controls</h3>
                        <h6>Note: Only the description is important. Google doesn't use keywords.</h6>

                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control" id="description" name="description"></textarea>
                            </div>
                        </div>
                        <!-- submit -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <button id="create" type="submit" class="btn btn-lg btn-success">Create Landing Pages!</button>
                                <a target="_blank" href="front-end" class="btn btn-lg btn-primary">Preview</a>
                            </div>
                        </div>



                    </form>


                </div>

                <div class="col-md-6">
                    <iframe src="front-end/">
                        <p>Your browser does not support iframes.</p>
                    </iframe>
                </div>

            </div>




            <div class="col-md-12">

            </div>
        </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/rad.js"></script>

    <!-- wysiwyg -->


</body>
</html>
