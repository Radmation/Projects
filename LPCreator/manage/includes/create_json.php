<?php
//header("Access-Control-Allow-Origin: *");
// Start the session
session_start();
/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/26/2016
 * Time: 12:58 PM
 */

 /*
  *  ALL THE VARS FROM THE FORM
  */

// OPTIONS 1
$option1 = urldecode($_POST["option1"]);
$option1 = explode("\r\n", $_POST["option1"]);
// OPTIONS 2
$option2 = urldecode($_POST["option2"]);
$option2 = explode("\r\n", $_POST["option2"]);
// main cta
$main_cta = wrapQuotes(rtrim(urldecode($_POST["main_cta"])));
//slider
$slider_p = wrapQuotes(rtrim(urldecode($_POST["slider_p"])));
// edit_button_1
$edit_button_1 = wrapQuotes(rtrim(urldecode($_POST["edit_button_1"])));

//==================== SECTION 2 ===============================
// first h2
$first_h2 = wrapQuotes(rtrim(urldecode($_POST["first_h2"])));
//second h2
$second_h2 = wrapQuotes(rtrim(urldecode($_POST["second_h2"])));
// first p
$first_p = wrapQuotes(rtrim(urldecode($_POST["first_p"])));
// Form CTA
$submit = wrapQuotes(rtrim(urldecode($_POST["submit"])));

//==================== SECTION 3 ===============================
// section 3 heading
$section2_heading = wrapQuotes(rtrim(urldecode($_POST["section2_heading"])));
// section 3 paragraph heading description
$sec2_paragraph = wrapQuotes(rtrim(urldecode($_POST["sec2_paragraph"])));
// hot cold description
$one_description = wrapQuotes(rtrim(urldecode($_POST["1_description"])));
//clear cups description
$second_description = wrapQuotes(rtrim(urldecode($_POST["2_description"])));
//compostable food containers description
$third_description = wrapQuotes(rtrim(urldecode($_POST["3_description"])));
//paper hot cups description
$fourth_description = wrapQuotes(rtrim(urldecode($_POST["4_description"])));
//paper cold drink cups description
$fifth_description = wrapQuotes(rtrim(urldecode($_POST["5_description"])));
// compostable hot cups description
$sixth_description = wrapQuotes(rtrim(urldecode($_POST["6_description"])));


$description = wrapQuotes(rtrim(urldecode($_POST["description"])));



// only do stuff if all the data was received!
if ( !isset($option1) || !isset($option2) ) {

    $_SESSION['message'] = "Landing Pages Have Failed. Please try again.";

} else {

    // used in creation of LP's
    $option1 = array_filter($option1);
    $option2 = array_filter($option2);

    // help all textareas with quote's
    $slider_p = preg_replace("/\\\\'/", "'", $slider_p); // replace escaped single quotes with non-escaped singlequote
    $sec2_paragraph = preg_replace("/\\\\'/", "'", $sec2_paragraph); // replace escaped single quotes with non-escaped singlequote

    $one_description = preg_replace("/\\\\'/", "'", $one_description); // replace escaped single quotes with non-escaped singlequote
    $second_description = preg_replace("/\\\\'/", "'", $second_description); // replace escaped single quotes with non-escaped singlequote
    $third_description = preg_replace("/\\\\'/", "'", $third_description); // replace escaped single quotes with non-escaped singlequote
    $fourth_description = preg_replace("/\\\\'/", "'", $fourth_description); // replace escaped single quotes with non-escaped singlequote
    $fifth_description = preg_replace("/\\\\'/", "'", $fifth_description); // replace escaped single quotes with non-escaped singlequote
    $sixth_description = preg_replace("/\\\\'/", "'", $sixth_description); // replace escaped single quotes with non-escaped singlequote

    $description = preg_replace("/\\\\'/", "'", $description); // strip out white spaces






    /* ************************************************************
     *  BUILD OUT JSON FOR FILE
     * ***********************************************************/

    $sboption1 = "";

    for ($i = 0; $i < count($option1); $i++) {
        // last option // check for blank lines
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


// contents of JSON file
    $file_contents = <<< EOD
{
  "option1" :[
    $sboption1
  ],
  "option2" : [
    $sboption2
  ],
  "main_cta" : [
  $main_cta
  ],
  "slider_p" : [
  $slider_p
  ],
  "edit_button_1" : [
  $edit_button_1
  ],
  "first_h2" : [
  $first_h2
  ],
  "second_h2" : [
  $second_h2
  ],
  "first_p" : [
  $first_p
  ],
  "submit" : [
  $submit
  ],
  "section2_heading" : [
  $section2_heading
  ],
  "sec2_paragraph" : [
  $sec2_paragraph
  ],
  "one_description" : [
  $one_description
  ],
  "second_description" : [
  $second_description
  ],
  "third_description" : [
  $third_description
  ],
  "fourth_description" : [
  $fourth_description
  ],
  "fifth_description" : [
  $fifth_description
  ],
  "sixth_description" : [
  $sixth_description
  ],
  "description" : [
  $description
  ]
}
EOD;

    // UPDATES the JSON
    $file_name = "../words.json"; // name of file
    $file = fopen($file_name, "w"); // open the dir with a write
    fwrite($file, $file_contents); // write to the file
    fclose($file); // close the file


    // get the vars ready for html document
    // text areas
    $slider_p = stripslashes($slider_p); // get rid of slashes of all text areas
    $slider_p = substr($slider_p, 1); // remove quotes at beginning of all vars
    $slider_p = substr($slider_p, 0, -1); // remove quotes at beginning of all vars

    $description = stripslashes($description); // get rid of slashes of all text areas
    $description = substr($description, 1); // remove quotes at beginning of all vars
    $description = substr($description, 0, -1); // remove quotes at beginning of all vars

    $old_description = $description;




    $first_p = stripslashes($first_p); // get rid of slashes of all text areas
    $first_p = substr($first_p, 1); // remove quotes at beginning of all vars
    $first_p = substr($first_p, 0, -1); // remove quotes at beginning of all vars

    $sec2_paragraph = stripslashes($sec2_paragraph); // get rid of slashes of all text areas
    $sec2_paragraph = substr($sec2_paragraph, 1); // remove quotes at beginning of all vars
    $sec2_paragraph = substr($sec2_paragraph, 0, -1); // remove quotes at beginning of all vars

    $one_description = stripslashes($one_description); // get rid of slashes of all text areas
    $one_description = substr($one_description, 1); // remove quotes at beginning of all vars
    $one_description = substr($one_description, 0, -1); // remove quotes at beginning of all vars

    $second_description = stripslashes($second_description); // get rid of slashes of all text areas
    $second_description = substr($second_description, 1); // remove quotes at beginning of all vars
    $second_description = substr($second_description, 0, -1); // remove quotes at beginning of all vars

    $third_description = stripslashes($third_description); // get rid of slashes of all text areas
    $third_description = substr($third_description, 1); // remove quotes at beginning of all vars
    $third_description = substr($third_description, 0, -1); // remove quotes at beginning of all vars

    $fourth_description = stripslashes($fourth_description); // get rid of slashes of all text areas
    $fourth_description = substr($fourth_description, 1); // remove quotes at beginning of all vars
    $fourth_description = substr($fourth_description, 0, -1); // remove quotes at beginning of all vars

    $fifth_description = stripslashes($fifth_description); // get rid of slashes of all text areas
    $fifth_description = substr($fifth_description, 1); // remove quotes at beginning of all vars
    $fifth_description = substr($fifth_description, 0, -1); // remove quotes at beginning of all vars

    $sixth_description = stripslashes($sixth_description); // get rid of slashes of all text areas
    $sixth_description = substr($sixth_description, 1); // remove quotes at beginning of all vars
    $sixth_description = substr($sixth_description, 0, -1); // remove quotes at beginning of all vars

    //inputs type=text
    $main_cta = substr($main_cta, 1);
    $main_cta = substr($main_cta, 0, -1);

    $edit_button_1 = substr($edit_button_1, 1);
    $edit_button_1 = substr($edit_button_1, 0, -1);

    $first_h2 = substr($first_h2, 1);
    $first_h2 = substr($first_h2, 0, -1);

    $second_h2 = substr($second_h2, 1);
    $second_h2 = substr($second_h2, 0, -1);

    $submit = substr($submit, 1);
    $submit = substr($submit, 0, -1);

    $section2_heading = substr($section2_heading, 1);
    $section2_heading = substr($section2_heading, 0, -1);

    // CREATE THE DIRECTORIES AND THE LP's

    for ($i = 0; $i < count($option1); $i++) {

        for ($j = 0; $j < count($option2); $j++) {

            // make a directory
            // make a directory
            $dir = strtolower($option1[$i]) . "-" . strtolower($option2[$j]);
            $dir = preg_replace("/ +/", " ", $dir); # convert all multispaces to space
            $dir = preg_replace("/ +/", "-", $dir); // replace white spaces and _ to -


            // o1 test o2
            $description = preg_replace("/o1/", $option1[$i], $description); // strip out white spaces
            $description = preg_replace("/o2/", $option2[$j], $description); // strip out white spaces
            // must reset description



            $file_name = "index.html"; // name of file

            // contents of html file todo: add newly updated html index here
            $file_contents = <<< EOD
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>$option1[$i] $option2[$j]</title>
        <meta name="description" content="$description">
        
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="icon" href="../manage/favicon.png" type="image/png">


        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,300,700,600,500' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700' rel='stylesheet' type='text/css'>

        <!-- jQuery Ui -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

        <link rel="stylesheet" href="../manage/front-end/css/slicknav.css">
        <link rel="stylesheet" href="../manage/front-end/css/owl.carousel.css">
        <link rel="stylesheet" href="../manage/front-end/css/font-awesome.min.css">
        <link rel="stylesheet" href="../manage/front-end/css/bootstrap.min.css">
        <link rel="stylesheet" href="../manage/front-end/css/main.css">
        <link rel="stylesheet" href="../manage/front-end/css/responsive.css">
        <script src="../manage/front-end/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-79279122-1', 'auto');
    ga('send', 'pageview');

</script>

        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



        <!-- header/nav -->
        <section id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-left">

							<nav class="navbar navbar-default" role="navigation">
							  <div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
								  <div class="nav-logo">
									<a href="#"><img src="../manage/front-end/img/logo.png" alt="logo"></a>
								  </div>
								</div>
                                  <div class="pull-right nav-tabs">
                                      <a href="mailto:custom@custompapercup.com">
                                          <i class="fa fa-envelope-o fa-2x"></i>
                                      </a>
                                  </div>
							  </div><!-- /.container-fluid -->
							</nav>

                        </div>
                    </div><!-- .col-md-6 -->

                </div><!-- .row close -->
            </div><!-- .container close -->
        </section><!-- #heder close -->

        <!-- Hero -->
        <section id="slider1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="block">
                            <div class="slider-text-area">
                                <div class="slider-text">
                                    <h1>$option1[$i] $option2[$j]</h1>
                                    <p class="sub-slider-text">$main_cta</p>
                                    <p class="slider_p">$slider_p</p>
                                    <button type="button" class="main_button btn btn-default edit_button_1">$edit_button_1</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col-md-12 close -->
                </div><!-- .row close -->
            </div><!-- .container close -->
        </section><!-- #slider close -->

        <!-- LEAD FORM START
        ============================================================= -->

        <section id="lead_form_wrapper">
            <div class="container">



                <div class="contant-1-text-are col-md-6">
                    <div class="contant-1-head">
                        <h2 id="first_h2">$first_h2</h2>
                    </div>
                    <div class="contant-1-text">
                        <h2 id="second_h2">$second_h2</h2>
                        <p id="first_p">$first_p</p>
                        <img src="../manage/front-end/img/Yo-MG-16oz-Soup-Cup.png">
                    </div>
                </div>


                <form class="form col-md-6" action="../manage/includes/collect_lead.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name" class="control-label">Your Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="companyName" class="control-label">Company Name</label>
                        <input type="text" class="form-control" name="companyName" id="companyName" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="control-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="reachTime" class="control-label ">Best Time to Reach You</label>
                        <input type="text" class="form-control" name="reachTime" id="reachTime" required> <!-- todo: make date picker -->
                    </div>

                    <!--slider -->
                    <div class="form-group">
                        <label for="storesOperated" class="control-label">How Many Stores Do You Operate?</label><br>
                        <select name="storesOperated" id="storesOperated" class="form-control rad-select" required>
                            <option value="1">1</option>
                            <option value="2-5">2-5</option>
                            <option value="5-10">5-10</option>
                            <option value="10+">10+</option>
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="cupSize" class="control-label">What Size Cups Are of Interest?</label><br>
                        <select name="cupSize" id="cupSize" class="form-control rad-select" required>
                            <option value="2oz">2oz</option>
                            <option value="4oz">4oz</option>
                            <option value="5oz">5oz</option>
                            <option value="6oz">6oz</option>
                            <option value="8oz">8oz</option>
                            <option value="9oz">9oz</option>
                            <option value="10oz">10oz</option>
                            <option value="12oz">12oz</option>
                            <option value="16oz">16oz</option>
                            <option value="20oz">20oz</option>
                            <option value="24oz">24oz</option>
                            <option value="32oz">32oz</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cupType" class="control-label">What Type of Cups Are of Interest?</label><br>
                        <select name="cupType" id="cupType" class="form-control rad-select" required>
                            <option value="paperHot">Paper Hot</option>
                            <option value="paperCold">Paper Cold</option>
                            <option value="containerHot">Container - Hot</option>
                            <option value="containerCold">Container - Cold</option>
                            <option value="clearPlasticPET">Clear Plastic PET</option>
                            <option value="clearPlasticPP">Clear Plastic PP</option>
                            <option value="lids">Lids</option>
                            <option value="iceCreamPaperLid">Ice Cream-Paper Lid</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="annualUsage" class="control-label">Annual Usage?</label><br>
                        <select name="annualUsage" id="annualUsage" class="form-control rad-select" required>
                            <option value="1000">1,000</option>
                            <option value="5000">5,000</option>
                            <option value="10000">10,000</option>
                            <option value="30000">30,000</option>
                            <option value="100000">100,000+</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="expectedDelivery" class="control-label">Expected Delivery Date</label><br>
                        <select name="expectedDelivery" id="expectedDelivery" class="form-control rad-select" required>
                            <option value="rush">Rush</option>
                            <option value="10days">10 days</option>
                            <option value="30days">30 days</option>
                            <option value="65days">65 days</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="uploadLogo" class="control-label">Upload Logo</label>
                        <input type="file" class="" name="uploadLogo" id="uploadLogo"> <!-- todo: make date picker -->
                    </div>

                    <div class="form-group">
                        <label for="submit" class="control-label"></label>
                        <input id="submit" type="submit" class="btn btn-primary" value="$submit"> <!-- todo: make date picker -->
                    </div>

                </form>
            </div>

        </section>

        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-top">
                            <div class="service-header">
                                <h2 id="section2_heading">$section2_heading</h2>
                                <p id="sec2_paragraph">$sec2_paragraph</p>
                            </div>
                        </div>
                    </div><!-- .col-md-12 close -->
                </div><!-- row close -->
				<div class="row">
					<div class="col-md-12">
						<div class="block-bottom">
							<div class="service-tab">
								  <!-- Nav tabs -->
								  <ul class="badhon-tab" role="tablist">
									<li class="active"><a href="#rad1" aria-controls="rad1" role="tab" data-toggle="tab">
									Hot/Cold Food Containers
									</a></li>
									<li><a href="#rad2" aria-controls="rad2" role="tab" data-toggle="tab">
									Clear Cups
									</a></li>
									<li><a href="#rad3" aria-controls="rad3" role="tab" data-toggle="tab">
									Compostable Food Containers
									</a></li>
									<li><a href="#rad4" aria-controls="rad4" role="tab" data-toggle="tab">
									Paper Hot Cups
									</a></li>
									<li><a href="#rad5" aria-controls="rad5" role="tab" data-toggle="tab">
									Paper Cold Drink Cups
									</a></li>

                                      <li><a href="#rad6" aria-controls="rad6" role="tab" data-toggle="tab">
                                          Compostable Hot Cups
                                      </a></li>
								  </ul>

								  <!-- Tab panes -->
								  <div class="tab-content edit-tab-content">
									<div class="tab-pane active edit-tab" id="rad1">
                                        <img src="../manage/front-end/img/hot_cold_food_containers.png" alt="">
										<h2>Hot/Cold Food Containers</h2>
										<p id="1_description">$one_description</p>
									</div>
									<div class="tab-pane edit-tab" id="rad2">
                                        <img src="../manage/front-end/img/clear_cups.png" alt="">
										<h2>Clear Cups</h2>
										<p id="2_description">$second_description</p>
									</div>
									<div class="tab-pane edit-tab" id="rad3">
                                        <img src="../manage/front-end/img/compostable_food_containers.png" alt="">
										<h2>Compostable Food Containers</h2>
										<p id="3_description">$third_description</p>
									</div>
									<div class="tab-pane edit-tab" id="rad4">
                                        <img src="../manage/front-end/img/paper_hot_cups.png" alt="">
										<h2>Paper Hot Cups</h2>
										<p id="4_description">$fourth_description</p>
									</div>
									<div class="tab-pane edit-tab" id="rad5">
                                        <img src="../manage/front-end/img/paper_cold_drink_cups.png" alt="">
										<h2>Paper Cold Drink Cups</h2>
										<p id="5_description">$fifth_description</p>
									</div>
                                      <div class="tab-pane edit-tab" id="rad6">
                                          <img src="../manage/front-end/img/compostable_hot_cups.png" alt="">
                                          <h2>Compostable Hot Cups</h2>
                                          <p id="6_description">$sixth_description</p>
                                      </div>
								  </div>
							</div>
						</div>
					</div><!-- .col-md-12 close -->
				</div><!-- row close -->
            </div><!-- .container close -->
        </section><!-- #service close -->


        <!-- contant-1 start
        ===================================================== -->

        <section id="contant-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="block-left">
                            <div class="contant-1-text-area">
                                <div class="contant-1-head">
                                    <h2 id="sec_3_heading">How does it work?</h2>
                                </div>
                                <div class="contant-1-text">
                                    <h2 id="sec2_sub_head">Six simple steps.</h2>
                                    <div class="col-md-12">
                                        <span class="step">1.) Pick a Size</span>
                                        <p>We offer a range of cup/container sizes and styles from 4oz-32oz depending on your application and needs. Pick the size which works best for your use. Don’t see a size or style you need? Feel free to get in touch and we’ll do our best to meet your needs.</p>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="step">2.) Pick a Quantity</span>
                                        <p>Over this year based upon client demand we have significantly lowered our minimums. Select the quantity which most fits with your usage volume and keep in mind most of our cases are packed 1000 count – while there are some pack 600 count.</p>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="step">3.) Upload a Logo</span>
                                        <p>Already have a logo or some brand assets for printing on your cups? Great! You may upload this during the checkout process which will enable our design staff to work up a custom digital proof for your review.</p>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="step">4.) Payment Deposit</span>
                                        <p>An initial deposit is required prior to digital print proof development. Our shopping cart enables you to pay with multiple different methods such as MasterCard, PayPal, Visa, and others. Input your payment details at the checkout process which will process a 50% deposit on your order.  Upon confirmation of your deposit our superstar design team will get to work on your custom design proofs.</p>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="step">5.) Final Proof Sign Off</span>
                                        <p>Upon receiving your artwork files and feedback, our design team will work up a customized digital proof for your sign off and approval.  This is our final step before production where we ensure your layout, design, and brand elements are all in working order.</p>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="step">6.) Get Started</span>
                                        <p>Now that you have selected your product, the appropriate size, submitted your artworks, and paid your deposit we should be well on our way to delivering your product. We can take on average 60 to 65 days from order to delivery of your goods.</p>
                                    </div>
                                    <button type="button" class="main_button btn btn-default edit-button-2">Request A Free Quote</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col-md-6 close -->
                    <div class="col-md-6">
                        <div class="block-right">
                            <div class="block-right-img">
                                <img src="../manage/front-end/img/paper_cup.png" class="" alt="custom printed paper cup before print">
                            </div>
                        </div>
                    </div><!-- .col-md-6 close -->
                </div><!-- .row close -->
            </div><!-- .container close -->
        </section>
        <!-- #contant-1 close -->


        <!-- Gallery Start -->
        <section id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-top">
                            <div class="gallery-area">
                                <h2>Our Latest Cup Designs</h2>
                                <p>We take pride in serving thousands of satisfied clients just like yourself.  If opening a coffee shop, café, bakery, ice cream shop, frozen yogurt store, or simply need a branded product for your special event contact our team today for a custom quote to meet your needs.</p>
                            </div>
                        </div>
                    </div><!-- .col-md-12 -->
                </div><!-- .row close -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-bottom">
                            <div class="gallery-list" id="owl-demo">
                                <div class="gallery-items item">
                                    <div class="gallery-img">
                                        <img src="../manage/front-end/img/custom_print_1.jpg" alt="img">
                                    </div>
                                </div>

                                <div class="gallery-items item">
                                    <div class="gallery-img">
                                        <img src="../manage/front-end/img/custom_print_2.jpg" alt="img">
                                    </div>
                                </div>

                                <div class="gallery-items item">
                                    <div class="gallery-img">
                                        <img src="../manage/front-end/img/custom_print_3.jpg" alt="img">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div><!-- .col-md-12 close -->
                </div><!-- .row close -->
            </div><!-- .container close -->
        </section>
        <!-- #gallery close -->





        <!-- footer -->
        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <div class="footer-contant">
                                <h2>$option1[$i] $option2[$j]</h2>
                            </div>
                        </div>
                    </div><!-- col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </section>
        <!-- #footer -->




        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <!-- jQuery Ui -->
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

        <script src="../manage/front-end/js/owl.carousel.min.js"></script>
        <script src="../manage/front-end/js/bootstrap.min.js"></script>
        <script src="../manage/front-end/js/plugins.js"></script>
        <script src="../manage/front-end/js/main.js"></script>

        <!-- radley slider -->
        <script src="../manage/front-end/js/radley.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

    </body>
</html>

EOD;

            // reset description
            $description = $old_description;

            if ( is_dir("../../" . $dir) === false ) {
                mkdir("../../" . $dir);
            }

            $file = fopen("../../" . $dir . '/' . $file_name, "w"); // open the dir with a write
            fwrite($file, $file_contents); // write to the file
            fclose($file); // close the file

            //echo "Title Tag - " . $smallerArray[$i] . " " . $largerArray[$j] . "<br>" ;
        }

    }


    $_SESSION['message'] = "Landing Pages Have Been Created. Check the server to verify!";
//    echo "Landing Pages Have Been Created.";
    header('Location: ../creator.php');
}


function wrapQuotes($string)
{
    return "\"" . $string . "\"";
}
