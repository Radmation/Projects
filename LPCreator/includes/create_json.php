<?php
header("Access-Control-Allow-Origin: *");
// Start the session
session_start();
/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/26/2016
 * Time: 12:58 PM
 */

$option1;
$option2;
$heading_2_first;
$heading_2_second;
$para_first;
$description;
// get the data form the POST array
// check that they are both set
// url decode the options
if(isset($_POST["option1"]))
{
    $option1 = urldecode($_POST["option1"]);
    $option1 = explode("\r\n", $_POST["option1"]);
}

if(isset($_POST["option2"]))
{
    $option2 = urldecode($_POST["option2"]);
    $option2 = explode("\r\n", $_POST["option2"]);
}

// First Heading2 H2
if(isset($_POST["heading_2_first"]))
{
    $heading_2_first = urldecode($_POST["heading_2_first"]);
}
if(isset($_POST["heading_2_second"]))
{
    $heading_2_second = urldecode($_POST["heading_2_second"]);
}
if(isset($_POST["para_first"]))
{
    $para_first = urldecode($_POST["para_first"]);
}
if(isset($_POST["description"]))
{
    $description = urldecode($_POST["description"]);
}




// only do stuff if all the data was received!
// BUILD THE JSON FILES
if(!isset($option1) || !isset($option2) || !isset($heading_2_first) || !isset($heading_2_second) || !isset($para_first) || !isset($description) ) {

    echo "Please Try Again.";

} else {

    // used in creation of LP's
    $option1 = array_filter($option1);
    $option2 = array_filter($option2);

    $heading_2_first = wrapQuotes(rtrim($heading_2_first)); // strip out white spaces
    $heading_2_second = wrapQuotes(rtrim($heading_2_second)); // strip out white spaces
    $para_first = wrapQuotes(rtrim($para_first)); // strip out white spaces

    $para_first = preg_replace("/\\\\'/", "'", $para_first); // replace escaped single quotes with non-escaped singlequote

    $description = wrapQuotes(rtrim($description)); // strip out white spaces

    $sboption1 = "";

    for ($i = 0; $i < count($option1); $i++) {
        // last option
        // check for blank lines

        if ($i == count($option1) - 1) {
            $sboption1 .= "\"" . rtrim($option1[$i]) . "\"";
        } else {
            $sboption1 .= "\"" . rtrim($option1[$i]) . "\",\n";
        }


    }

    $sboption2 = "";
    for ($i = 0; $i < count($option2); $i++) {
        // last option
        if ($i == count($option2) - 1) {
            $sboption2 .= "\"" . rtrim($option2[$i]) . "\"";
        } else {
            $sboption2 .= "\"" . rtrim($option2[$i]) . "\",\n";
        }
    }


// Option1 and Option 2 are now safe to inject into json file

    // get the other pieces from the post to add to json file

// create a file
// contents of html file
    $file_contents = <<< EOD
{
  "option1" :[
    $sboption1
  ],
  "option2" : [
    $sboption2
  ],
  "heading_2_first" : [
  $heading_2_first
  ],
  "heading_2_second" : [
  $heading_2_second
  ],
  "para_first" : [
  $para_first
  ],
  "description" : [
  $description
  ]
}
EOD;

    $file_name = "../words.json"; // name of file

    $file = fopen($file_name, "w"); // open the dir with a write
    fwrite($file, $file_contents); // write to the file
    fclose($file); // close the file
    // UPDATES the JSON




    // get the vars ready for html document
    $para_first = stripslashes($para_first); // get rid of slashes
    $para_first= substr($para_first, 1); // remove quote at beginning
    $para_first= substr($para_first, 0, -1); // remove quote at beginning

    $heading_2_first = substr($heading_2_first, 1);
    $heading_2_first = substr($heading_2_first, 0, -1);

    $heading_2_second = substr($heading_2_second, 1);
    $heading_2_second = substr($heading_2_second, 0, -1);


    // CREATE THE DIRECTORIES AND THE LP's

    for($i = 0; $i < count($option1); $i++) {

        for($j = 0; $j < count($option2); $j++) {

            // make a directory
            $dir = strtolower($option1[$i]) . "-" . strtolower($option2[$j]);

            $file_name = "index.html"; // name of file

            // contents of html file todo: add newly updated html index here
            $file_contents = <<< EOD
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=$description>
    <title>$option1[$i] $option2[$j]</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/heroic-features.css" rel="stylesheet">
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
                <img src="../images/logo.png" class="img-responsive">

            </a>
        </div>
        <p class="navbar-text navbar-right pad-right">
            <a href="#" class="navbar-link">
            </a> 
        </p>
    </div>
</nav>

<div class="container-fluid no-pad">
    <!--<img src="../images/hero_images.jpg" class="img-responsive">-->
    <img src="../images/hero.jpg" class="img-responsive">
</div>

<div class="container">

    <div class="col-md-10 col-sm-12 col-xs-12">
        <h1 class="text-green">$option1[$i] $option2[$j]</h1>
        <p class="descriptor">$para_first</p>
    </div>

    <div class="col-md-6" id="form_wrap">
        <form class="form">
            <h2 class="text-white">$heading_2_first</h2>
            <div class="form-group">
                <input class="form-control" type="text" id="firstName" name="firstName" placeholder="First Name">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="lastName" name="lastName" placeholder="Last Name">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="address" name="address" placeholder="Address">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="zip" name="zip" placeholder="Zip Code">
            </div>
            <div class="form-group">
                <button class="form-control btn btn-success" type="submit">Find Charter Schools</button>
            </div>
        </form>
    </div>

    <div class="col-md-10 col-sm-12 col-xs-12">
        <h2 class="text-green">$heading_2_second</h2>
    </div>

    <div class="row text-center">

        <div class="col-md-4 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="../images/Globe.png" alt="National Reach Icon">
                <div class="caption">
                    <h3 class="text-green">National Reach</h3>
                    <p>We can match you with the charter schools in your area no matter where you live!</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="../images/GradCap.png" alt="Trusted Source Icon">
                <div class="caption">
                    <h3 class="text-green">Trusted Source</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="../images/Dictionary.png" alt="Dictionary Icon">
                <div class="caption">
                    <h3 class="text-green">Charter Experts</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div><!-- end row -->
</div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
EOD;

            if( is_dir($dir) === false )
            {
                mkdir( "../" . $dir);
            }

            $file = fopen("../" .$dir . '/' . $file_name, "w"); // open the dir with a write
            fwrite($file, $file_contents); // write to the file
            fclose($file); // close the file

            //echo "Title Tag - " . $smallerArray[$i] . " " . $largerArray[$j] . "<br>" ;
        }

    }


    echo "Landing Pages Have Been Created.";
}




function wrapQuotes($string) {
    return "\"" . $string . "\"";
}
