<?php
// get the url parameters
$campus = $_GET['id']; // campus
$program = $_GET['p']; //program
$brand = $_GET['b']; // brand
$src = $_GET['src']; // source


// pass the variables to javascript


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jquery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- BOOTSTRAP CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- get curriculum -->
<!--    <script type="text/javascript" src="js/curriculum.js"></script>-->

    <!-- validation scripts -->
    <script src="js/jquery.validate.min.js"></script><!-- for form validation -->
    <script src="js/additional-methods.min.js"></script><!-- for US phone number validation -->
    <script src="js/validate.js"></script><!-- my validation-->

    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet" type="text/css">



    <title></title>
</head>


<body>
<!-- header -->
<section id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="logos/brightwood/centered/centered_color.png" class="img-responsive" id="img-logo">
            </div>
            <div class="col-md-6 col-md-offset-3" id="phone_wrap">
                <h5 class="sailec">
                    <span class="sailec brand">Brightwood College</span> | <span class="i">Call Today</span> &nbsp;<span class="phone_top">888-888-8888</span>
                    <span style="font-size: 1.4em;" class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
                </h5>
            </div>
        </div>
    </div>
</section>

<section id="header_image">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><p>
<!--                <img alt="" src="images/banner.jpg" class="img-responsive" style="margin: auto;">-->
                <img alt="" src="http://placehold.it/1200x500" class="img-responsive">
                </p>
            </div>
        </div>
    </div>
</section>


<section id="form">
    <form class="form" method="post" action="http://kellybrady.digital/public_html/submit_eca.php">
        <div class="select_block">
            <label for="CampusId"></label>
            <select class="form-control" name="CampusId" id="CampusId">

                <option value="0">Select A Campus</option>
<!--                <option value="8A9A6E8E-35A2-4CAB-8F99-F4B92AC71F87">PA - Pittsburgh</option>-->
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

        <?php
        echo "<input type='hidden' id='CampaignName' name='CampaignName' value='$src'>";
        ?>

        <div class="text-center btn_wrap">
            <button type="submit" class="btn btn-primary dynamic" id="submit_btn">Let's Go!</button>
        </div>

        <p id="sif_disclaimer">
            By submitting this form, I am giving express written consent to receive text messages and/or telephone calls from or on behalf of Brightwood College at the phone number(s) I provided using automated technology. I understand that standard text and/or usage rates may apply and that I am not required to provide consent as a condition of any sale of a good or service.
        </p>

    </form>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="copy">



            </div>
        </div>

    </div>
</section>

<section id="footer">
    <div class="row">
        <p class="policy text-center">
            We will not sell or share your personal information, including your email and address, with any third party. This information is only kept on file to better serve you. For information about graduation rates, median debt of student show completed our programs, and other important information, please click here.
            <br>
            ©2015 Brightwood College - All Rights Reserved - <a href="https://www.brightwood.edu/privacy-policy/" target="_blank">Privacy Policy</a>
        </p>
    </div>
</section>

<!-- change content js -->
<!--<script src="js/change_content.js"></script><!-- for form validation -->-->

<!-- get first values from url parameters -->
<script>

    $(document).ready( function () {

        var campus = "";
        var program = "";
        var brand = "";
        var source = "";
        campus= '<?php echo $campus; ?>';
        program = '<?php echo $program; ?>';
        brand = '<?php echo $brand; ?>';
        source = '<?php echo $src; ?>';

        /////////////////////////////////////////////////////
        //    Get the programs xml and store in variable   //
        /////////////////////////////////////////////////////
        var xml_node = "";
        var campus1 = "";
        $.ajax({
            url: 'js/programs.xml',
            dataType: 'xml',
            async: false,
            success: function(data){
                // Extract relevant data from XML
                xml_node = $('mydoc',data);
                campus1 = xml_node.find('campus');

            },
            error: function(data){
                console.log('Error loading XML data');
            }
        });

        /////////////////////////////////////////////////////
        //         populate the campus drop down           //
        /////////////////////////////////////////////////////
        var program1 = "";
        campus1.each(function() {
            console.log( $(this).find("location").text()); // get the text
            console.log( $(this).find("location").attr('value') ); // get the value
            var location_text = $(this).find("location").text();
            var location_value = $(this).find("location").attr('value');

            $("#CampusId").append("<option value='" + location_value + "'>" + location_text + "</option>");

            program1 = $(this).find("program");// get the programs in a collection

        });

        /////////////////////////////////////////////////////
        // Get/Set the CAMPUS value from the url parameters//
        /////////////////////////////////////////////////////
        var selected_campus = xml_node.find("campus[id='" + campus + "']");
        console.log(selected_campus.attr('value'));
        $('#CampusId').val(selected_campus.attr('value')); // set the CAMPUS dropdown based on URL parameters

        UpdateCurriculums();
        /////////////////////////////////////////////////////
        //   Populate PROGRAMS dropdown based on campus     //
        /////////////////////////////////////////////////////
        // now find the value of the selected campus and populate programs
//        var program_collection = xml_node.find("campus[value='" + $('#CampusId').val() + "']>program");
//        program_collection.each(function() {
//            $('#CurriculumId').append("<option value='" + $(this).attr('value') +"'>" +  $(this).text() + "</option>");
//        });
//
//        /////////////////////////////////////////////////////
//        // Get/Set the CURRICULUM value from the url parameters//
//        /////////////////////////////////////////////////////
//        // get and set the value from the url parameters
//        var selected_program = xml_node.find("program[id='" + program + "']");
//        console.log(selected_program.attr('value'));
//        $('#CurriculumId').val(selected_program.attr('value'));



        //////////////////////////////////////////////////////////////////
        //  Get the course description that matches selected dropdown   //
        //////////////////////////////////////////////////////////////////
        // append to copy the content <description>
        //find the value of the description from the xml object where the value matches the description value
//        console.log(xml_node.find("description[value='" + $("#CurriculumId").val() +"']").text());
//        var description_html = xml_node.find("description[value='" + $("#CurriculumId").val() +"']").text();
//
//        console.log(description_html);
//        $('#copy').empty();
//        $('#copy').append(description_html);


        UpdateContent();



        $( "#CampusId").change(function() {
            UpdateCurriculums();
            $('#CurriculumId').val("0");
            UpdateContent();
        });

        $( "#CurriculumId").change(function() {

            UpdateContent();
        });



        function UpdateContent() {
            //////////////////////////////////////////////////////////////////
            //  Get the course description that matches selected dropdown   //
            //////////////////////////////////////////////////////////////////
            // append to copy the content <description>
            //find the value of the description from the xml object where the value matches the description value
            $("#copy").empty();
            console.log(xml_node.find("description[value='" + $("#CurriculumId").val() +"']").text());
            var description_html = xml_node.find("description[value='" + $("#CurriculumId").val() +"']").text();

            console.log(description_html);
            $('#copy').append(description_html);

            // get the brand
            var brand_text = xml_node.find("brand[value='" + $("#CampusId").val() +"']").text();
            $(".brand").empty();
            $(".brand").append(brand_text);
            var brand_path = xml_node.find("brand[value='" + $("#CampusId").val() +"']").attr("path");
            console.log(brand_path); // GOT BRAND HERE BC = Brightwood College BCI = Brightwood Career Instititute
            $('#img-logo').attr( "src", "logos/"+ brand_path +"/centered/centered_color.png" );
            // get the phone
            var phone = xml_node.find("phone[value='" + $("#CampusId").val() +"']").text();
            $(".phone_top").empty(); // DYNAMIC CONTENT PHONE
            $(".phone_top").append(phone);
        }

        function UpdateCurriculums() {
            /////////////////////////////////////////////////////
            //   Populate PROGRAMS dropdown based on campus    //
            /////////////////////////////////////////////////////
            $("#copy").empty();
            $("#CurriculumId option").remove();
            // now find the value of the selected campus and populate programs
            var program_collection = xml_node.find("campus[value='" + $('#CampusId').val() + "']>program");
            program_collection.each(function() {
                $('#CurriculumId').append("<option value='" + $(this).attr('value') +"'>" +  $(this).text() + "</option>");

            });

            /////////////////////////////////////////////////////
            // Get/Set the CURRICULUM value from the url parameters//
            /////////////////////////////////////////////////////
            // get and set the value from the url parameters
            var selected_program = xml_node.find("program[id='" + program + "']");
            console.log(selected_program.attr('value'));
            $('#CurriculumId').val(selected_program.attr('value'));
        }

    }); // end document ready



</script>




</body>
</html>