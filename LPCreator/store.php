<?php
/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/25/2016
 * Time: 1:16 PM
 */

// get locations from JSON array
$cities = ["Spokane" , "Seattle"];
$keywords = ["Charter Schools","Free Private Schools", "Public School Alternative"];


$smallerArray = returnSmallerArray($cities, $keywords);
$largerArray = returnLargerArray($cities, $keywords);


for($i = 0; $i < count($smallerArray); $i++) {

    for($j = 0; $j < count($largerArray); $j++) {

        // make a directory
        $dir = $smallerArray[$i] . " " . $largerArray[$j];

        $file_name = "index.html"; // name of file

        // contents of html file
        $file_contents = <<< EOD
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>$smallerArray[$i] $largerArray[$j]</title>
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
    <div class="container">
        <div id="form_wrap">
            <h2 class="text-green text-bold"><i class="fa fa-2x fa-map-marker" aria-hidden="true"></i> Find Charter Schools in {0}</h2>
            <form class="form" id="start">
                <div class="form-group">
                    <label></label>
                    <input id="zip" type="text" class="form-control" placeholder="ENTER ZIP CODE">
                    <button class="btn btn-success btn-md">FIND MY MATCHES</button>
                </div>
            </form>
        </div>
        <header class="jumbotron hero-spacer">
            <h1 id="h1">$smallerArray[$i] $largerArray[$j]</h1>
            <p>A charter school is an independently run public school granted greater flexibility in its operations,
                in return for greater accountability for performance. The "charter" establishing each school is a
                performance contract detailing the school's mission, program, students served, performance goals,
                and methods of assessment.</p>
        </header>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <h2>Let Us Find You A Match!<br>$smallerArray[$i] $largerArray[$j]</h2>
                <h3>We Will Find A Charter School Near You!</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../_images/national.jpg" alt="National">
                    <div class="caption">
                        <h3>National Reach</h3>
                        <p>We can match you with the charter schools in your area no matter where you live!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../_images/trusted.jpg" alt="Trusted">
                    <div class="caption">
                        <h3>Most Trusted Source</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../_images/expert.jpg" alt="Expert">
                    <div class="caption">
                        <h3>Charter School Experts</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

EOD;

        if( is_dir($dir) === false )
        {
            mkdir($dir);
        }

        $file = fopen($dir . '/' . $file_name, "w"); // open the dir with a write
        fwrite($file, $file_contents); // write to the file
        fclose($file); // close the file

        //echo "Title Tag - " . $smallerArray[$i] . " " . $largerArray[$j] . "<br>" ;
    }

}




function returnLargerArray($array1, $array2) {
    if(count($array1) > count($array2)){
        return $array1;
    }
    else if( count($array2) > count($array1) ){
        return $array2;
    } else { // equal
        return $array1;
    }
}
function returnSmallerArray($array1, $array2) {
    if(count($array1) < count($array2)){
        return $array1;
    }
    else if( count($array2) < count($array1) ){
        return $array2;
    } else { // equal
        return $array2;
    }
}