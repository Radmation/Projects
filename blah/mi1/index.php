<!DOCTYPE html>
<html>

<?
    include 'dynamic_content.php';
?>
<!-- web browser support -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <!--    <meta name="description" content="The Media Institutes of Madison and Minneapolis offer nationally accredited new media degrees in many fields">-->
<!--    <meta name="keywords" content="media degree, video, art, design, recording, gaming, home security, mobile apps">-->

    <!-- jquery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- BOOTSTRAP CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- delete me TODO: -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- fonts -->
    <!-- TODO: install fonts on server via creative clound under typekit settings...add domain -->
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,800,400' rel='stylesheet' type='text/css'>
    <!--type kit -->
    <script src="//use.typekit.net/qti8iuf.js"></script>
    <script>
        try {
            Typekit.load();
        } catch (e) {
        }
    </script>

    <!-- OPTIMIZELY ab test code -->
    <script src="//cdn.optimizely.com/js/3519860309.js"></script>

    <!-- my styles -->
    <link href="styles/looks.css" rel="stylesheet" type="text/css">

    <!-- validation js -->
<!--    <script src="//cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>-->
<!--    <script src="//cdn.jsdelivr.net/jquery.validation/1.14.0/additional-methods.min.js"></script><!-- for US phone number validation -->
    <script src="js/jquery.validate.min.js"></script><!-- for form validation -->
    <script src="js/additional-methods.min.js"></script><!-- for US phone number validation -->
    <script src="js/validate.js"></script><!-- my validation-->


    <title>Enroll Now!</title>


</head>

<body>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PMRFXG"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PMRFXG');</script>
<!-- End Google Tag Manager -->


<section id="header">
    <div class="container-fluid">

        <div class="phone_num_top web">
            <h3 class="phone_number_head">Call Us <span class="phone_num">1-844-265-8383</span></h3>
        </div>
        <div class="phone_num_top mobile">
            <h3 class="phone_number_head">TAP TO CALL US NOW!</h3>
            <a id="phone_number_a" href="tel:1-844-265-8383"> <!-- changed from js file -->
                <button type="button" class="btn btn-success btn-lg">
                    <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Call Us
                </button>
            </a>
        </div>

        <img class="logo img-responsive" src="images/logo_top.png" alt="College Students">

    </div>
</section>

<section id="top_bar">

    <div class="container-fluid">
        <div class="image_wrap">
            <img id="header_img" class="img-responsive caption_image dynamic" src="images/students.jpg" alt="College Students">
        </div>
        <div id="banner">
            <h2 class="text-center banner_text dynamic">ENROLL</h2>
        </div>
    </div>

</section>

<section id="form">
    <h1 class="text-center text-white dynamic" id="form_cta">GET STARTED TODAY!</h1>

    <form class="form" id="lead_form" action="http://kellybrady.digital/public_html/submit_mmi.php" method="post">
        <div class="select_block">
            <label for="CampusId"></label>
            <select class="form-control" name="CampusId" id="CampusId">
                <?php echo $Campus; ?>
            </select>
            <label for="CurriculumId"></label>
            <select class="form-control" name="CurriculumId" id="CurriculumId">
            </select>
        </div>

        <div class="form-group">
            <!--<label for="exampleInputEmail1">Email address</label>-->
            <label for="FirstName">First Name</label>
            <input type="text" name="FirstName" class="form-control" id="FirstName" placeholder="First Name">
        </div>
        <div class="form-group">
            <!--<label for="exampleInputEmail1">Email address</label>-->
            <label for="LastName">Last Name</label>
            <input type="text" name="LastName" class="form-control" id="LastName" placeholder="Last Name">
        </div>
        <div class="form-group">
            <!--<label for="exampleInputEmail1">Email address</label>-->
            <label for="Email">Email Address</label>
            <input type="email" name="Email" class="form-control" id="Email" placeholder="Email">
        </div>
        <div class="form-group">
            <!--<label for="exampleInputEmail1">Email address</label>-->
            <label for="Phone1">Phone Number</label>
            <input type="text" name="Phone1" class="form-control" id="Phone1"  placeholder="Phone Number">
        </div>

        <div class="form-group">
            <!--<label for="exampleInputEmail1">Email address</label>-->
            <label for="PostalCode">Zip Code</label>
            <input type="text" name="PostalCode" class="form-control" id="PostalCode"  placeholder="Zip Code">
        </div>

        <input type="hidden" id="CampaignName" name="CampaignName" value="<? echo $C_Name; ?>"/>

        <div class="text-center btn_wrap">
            <button type="submit" class="btn btn-primary dynamic" id="submit_btn">SUBMIT</button>
        </div>
    </form>

    <p class="form_disclaimer">
        By filling out this form, you understand that Media Institute will utilize this information to contact you to provide more information about Media Institute by a variety of methods including phone (both mobile or home, dialed manually or automatically), email, mail, and text message.
    </p>
    <script>

    </script>
</section>


<section id="content">
    <div class="container">
        <h2 class="text-blue serif-font cta_blue dynamic">TURN YOUR PASSION INTO YOUR CAREER! APPLY TODAY!</h2>

        <div class="off-set-left">
            <h3 class="text-orange text-bold dynamic" id="program_title"><?php echo $ProgramTitle; ?></h3>

            <div class="description">
                <p id="first_block" class="first_block"></p>
                <ul id="points" class="points"></ul>
                <p id="second_block" class="second_block"></p>
            </div>

        </div>
    </div>
</section>


<section id="social_foot">
    <div class="disclaimer text-center" id="disclaimer">
        <p>
            ACCREDITED By the Accrediting Council for Independent Colleges and Schools – ACICS
        </p>

        <p class="pp_text_wrap">
            View Our <a class="dynamic" href="http://www.mediainstitute.edu/privacy-policy">Privacy Policy</a>
        </p>

        <div class="social_wrap">
            <a class="dynamic" href="<?php echo $facebook; ?>" target="_blank"><img src="images/facebook.png" alt=""></a>
            <a class="dynamic" href="<?php echo $twitter; ?>" target="_blank"><img src="images/twitter.png" alt=""></a>
            <a class="dynamic" href="<?php echo $youtube; ?>" target="_blank"><img src="images/youtube.png" alt=""></a>
        </div>
    </div>
</section>

<section id="footer">
    <div class="container">

        <div class="row">

            <div class="address text-center col-xs-6 col-sm-3 col-sm-offset-3 footlogo">
                <span class="dynamic" id="school_name"></span><br>
                <span class="dynamic" id="address1"></span><br>
                <span class="dynamic" id="address2"></span><br>
                <span class="dynamic phone_num"></span><br>
            </div>

            <div class="text-center col-xs-6 col-sm-3 footlogo">
                <img src="images/foot_logo.png" alt="">
            </div>

            <!-- Add the extra clearfix for only the required viewport -->
            <div class="clearfix visible-xs-block"></div>
        </div>
        <div class="row">
            <div class="text-center col-md-12 copy_wrap">
                <p class="small">All Content Copyright &copy; Madison and Minneapolis Media Institutes. All Rights
                    Reserved</p>
            </div>
        </div>

    </div>
</section>

<!-- jQuery CDN (necessary for Bootstrap's JavaScript plugins)and BOOTSTRAP js - The order is important-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<!-- TODO: MAKE FIELD DYNAMIC BASED ON SELECTED COURSE/CAMPUS -->
<script type="text/javascript" src="js/get_content.js"></script> <!-- updatePrograms() called here first -->
<!-- populates courses -->

<?php echo $Script_Program; ?> <!-- sets the selected course ** AFTER COURSES ARE POPULATED -->

<script type="text/javascript">
    updatePageContent();<!-- update page content -->
</script>







</body>
</html>
