<?php
/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/31/2016
 * Time: 11:24 AM
 */
$name = "";
$companyName = "";
$email = "";
$phone = "";
$reachTime = "";
$storesOperated = "";
$cupSize = "";
$cupType = "";
$annualUsage = "";
$expectedDelivery = "";
$uploadLogo = "";

if(isset($_POST["submit"])) {
    // do stuff
}



if( !isset($_POST['name']) ||
    !isset($_POST['companyName']) ||
    !isset($_POST['email'])  ||
    !isset($_POST['phone']) ||
    !isset($_POST['reachTime']) ||
    !isset($_POST['storesOperated']) ||
    !isset($_POST['cupSize']) ||
    !isset($_POST['cupType']) ||
    !isset($_POST['annualUsage']) ||
    !isset($_POST['expectedDelivery'])
) {
    // failed here
    //echo "Fail Here <br>";
    //var_dump($_POST);
} else {
    // lead data came through okay - insert into db or excel form

    // connect to db
//    $host = "localhost";
//    $username = "radley";
//    $password = "1Animation2";
//    $db_name = "custompapercup";

    $host = "68.178.217.38";
    $username = "radcustompaper";
    $password = "Y38HWcEeGPExvG4J!";
    $db_name = "radcustompaper";

    // create connection object
    $conn = new mysqli($host, $username, $password, $db_name);

    // sanitize the inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $companyName = mysqli_real_escape_string($conn, $_POST['companyName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $reachTime = mysqli_real_escape_string($conn, $_POST['reachTime']);
    $storesOperated = mysqli_real_escape_string($conn, $_POST['storesOperated']);
    $cupSize = mysqli_real_escape_string($conn, $_POST['cupSize']);
    $cupType = mysqli_real_escape_string($conn, $_POST['cupType']);
    $annualUsage = mysqli_real_escape_string($conn, $_POST['annualUsage']);
    $expectedDelivery = mysqli_real_escape_string($conn, $_POST['expectedDelivery']);
    $uploadLogo = mysqli_real_escape_string($conn, $_POST['uploadLogo']);


    $target_dir = "../uploads/";
    $target_file = "uploads/" .   time() . basename($_FILES["uploadLogo"]["name"]); // gets the file name with time added to the end

    // UPLOADED FILE CHECKING HERE

    //    } elseif ($_FILES['uploadLogo']['type'] != 'image/gif') {
    //        $error = 'Only .gif files are allowed';
    //    }
//    if ($sizeInfo[0] > 100 || $sizeInfo[1] > 125) {
//        $error = 'Image dimensions should be within 100*125';
//    }

    $error = '';

    if ($_FILES['uploadLogo']['error'] > 0) {
        $error = 'Sorry, there was an error in uploading the file';
    } elseif ($_FILES['uploadLogo']['size'] >  555551200) { // Bigger than 5550KB
        $error = 'Files size should be less than 50MB - need to do work here';
    } else {
        $sizeInfo = getimagesize($_FILES['uploadLogo']['tmp_name']); // temp location of the file -> need to move it
        move_uploaded_file($_FILES['uploadLogo']['tmp_name'], "../" . $target_file); // should save file on server in uploads folder
    }

    if ($error == '') {
       // echo 'Your photo was uploaded successfully';
    } else {
       // echo $error;
    }

    $sql = "INSERT INTO Leads (lead_name, company_name, email, phone, contact_time, stores_operated, cup_size, cup_type, annual_usage, delivery_date, logo_path, exported)
              VALUES ('$name', '$companyName', '$email', '$phone', '$reachTime', '$storesOperated', '$cupSize', '$cupType', '$annualUsage', '$expectedDelivery', '$target_file', 0)";

    if ($conn->query($sql) === TRUE) {
        // worked
        //echo "New record created successfully";
    } else {
        // failed
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // close the connection
    $conn->close();
}

// redirect thank you page
header('Location: ../front-end/thank-you.html');