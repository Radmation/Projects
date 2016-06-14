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

    <link rel="icon" href="favicon.png" type="image/png">

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

                    <form class="form-horizontal" id="ajax-form" action="includes/create_json.php" method="POST">
                        <?php
                        if(isset($_SESSION['message'])) {
                            echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
                            unset($_SESSION['message']);
                        }
                        ?>
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

                        <!-- General Copy -->
                        <hr>
                        <h3>First Section Copy</h3>

                        <!-- MAIN CTA -->
                        <div class="form-group">
                            <label for="main_cta" class="col-sm-3 control-label">Main CTA</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="main_cta" name="main_cta">
                            </div>
                        </div>

                        <!-- MAIN PARAGRAPH -->
                        <div class="form-group">
                            <label for="slider_p" class="col-sm-3 control-label">Main P</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="slider_p" name="slider_p"></textarea>
                            </div>
                        </div>

                        <!-- MAIN BUTTON -->
                        <div class="form-group">
                            <label for="edit_button_1" class="col-sm-3 control-label">Main Button CTA</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="edit_button_1" name="edit_button_1">
                            </div>
                        </div>

                        <hr>
                        <h3>Second Section Copy</h3>

                        <!-- FIRST H2-->
                        <div class="form-group">
                            <label for="first_h2" class="col-sm-3 control-label">First H2</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="first_h2" name="first_h2">
                            </div>
                        </div>

                        <!-- MAIN PARAGRAPH -->
                        <div class="form-group">
                            <label for="second_h2" class="col-sm-3 control-label">Second H2</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="second_h2" name="second_h2">
                            </div>
                        </div>

                        <!-- FIRST PARAGRAPH -->
                        <div class="form-group">
                            <label for="first_p" class="col-sm-3 control-label">First P</label>
                            <div class="col-sm-9">
                                <textarea type="text"  class="form-control" id="first_p" name="first_p"></textarea>
                            </div>
                        </div>

                        <!-- FORM CTA -->
                        <div class="form-group">
                            <label for="submit" class="col-sm-3 control-label">From CTA</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="submit" name="submit">
                            </div>
                        </div>

                        <hr>
                        <h3>Third Section Copy</h3>

                        <!-- SECTION 2 HEADING -->
                        <div class="form-group">
                            <label for="section2_heading" class="col-sm-3 control-label">Heading</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" id="section2_heading" name="section2_heading">
                            </div>
                        </div>

                        <!-- SECTION 2 SUB HEAD -->
                        <div class="form-group">
                            <label for="sec2_paragraph" class="col-sm-3 control-label">Section p</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="sec2_paragraph" name="sec2_paragraph"></textarea>
                            </div>
                        </div>

                        <!-- Hot/Cold Containers Description-->
                        <div class="form-group">
                            <label for="1_description" class="col-sm-3 control-label">Hot/Cold p</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="1_description" name="1_description"></textarea>
                            </div>
                        </div>

                        <!-- Clear Cups Description -->
                        <div class="form-group">
                            <label for="2_description" class="col-sm-3 control-label">Clear Cups p</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="2_description" name="2_description"></textarea>
                            </div>
                        </div>

                        <!-- Compostable Description-->
                        <div class="form-group">
                            <label for="3_description" class="col-sm-3 control-label">Compostable Food p</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="3_description" name="3_description"></textarea>
                            </div>
                        </div>

                        <!-- Paper Hot Cups Description -->
                        <div class="form-group">
                            <label for="4_description" class="col-sm-3 control-label">Paper Hot Cups</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="4_description" name="4_description"></textarea>
                            </div>
                        </div>

                        <!-- Paper Cold Drink Cups Description -->
                        <div class="form-group">
                            <label for="5_description" class="col-sm-3 control-label">Paper Cold Cups</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control" id="5_description" name="5_description"></textarea>
                            </div>
                        </div>

                        <!-- Compostable hot Cups Description -->
                        <div class="form-group">
                            <label for="6_description" class="col-sm-3 control-label">Compostable Hot Cups</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="6_description" name="6_description"></textarea>
                            </div>
                        </div>

<!--                        <hr>-->
<!--                        <h3>Third Section Copy</h3>-->

                        <!-- Third Section  Heading-->
<!--                        <div class="form-group">-->
<!--                            <label for="sec_3_heading" class="col-sm-3 control-label">Heading</label>-->
<!--                            <div class="col-sm-9">-->
<!--                                <input type="text"  class="form-control" id="sec_3_heading" name="sec_3_heading">-->
<!--                            </div>-->
<!--                        </div>-->

                        <!-- Third SUB Section Heading-->
<!--                        <div class="form-group">-->
<!--                            <label for="sec2_sub_head" class="col-sm-3 control-label">Sub Heading</label>-->
<!--                            <div class="col-sm-9">-->
<!--                                <input type="text"  class="form-control" id="sec2_sub_head" name="sec2_sub_head">-->
<!--                            </div>-->
<!--                        </div>-->

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

                <div class="col-md-6" id="iframe_wrap">
                    <iframe src="front-end">
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
