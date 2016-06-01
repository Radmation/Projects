<?php
// start the session
session_start();
//// remove all session variables - for user
//session_unset();
//// destroy the session - for user
//session_destroy();


/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/27/2016
 * Time: 11:06 AM
 */

$host = "localhost";
$username = "charterschool";
$password = "sZ58ybemktbW";

$email = "";


$can_log_in = false;

// sanitize the inputs
if(isset($_POST['email']) && isset($_POST['password'])){
    // create connection object
    $conn = new mysqli($host, $username, $password);
    // sanitize the inputs
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        //echo "Success!"; // de bugging
    }
    // Change database to "charterschool"
    mysqli_select_db($conn,"charterschool");

    //run the store function -> returns row
    $result = mysqli_query($conn, "SELECT fnIsValidLogin('$email', '$password')") or die("Query fail: " . mysqli_error());

    $can_log_in = 0; // default to cannot log in

    while ($row = mysqli_fetch_array($result)){
        $can_log_in = $row[0];
    }

    mysqli_close($conn); // close the connection

    // log in success
    if($can_log_in == 1) {

    }


} else {
    $can_log_in = 0;
}



if($can_log_in == 1) {
    $_SESSION['logged_in'] = true; // set session vars
    $_SESSION['email'] = $email; // set session vars
    header('location:../creator.php'); // redirect to creator page
} else {
    unset($_SESSION['logged_in']);
    $_SESSION['message'] = "Login failed. Please try again.";
    header('location:../login.php');
}

//echo json_encode($response_array); // return => {"logged_in" : "error"}
//
//$response_array['logged_in'] = null;
//
//unset($_POST['email'] );
//unset($_POST['password'] );
