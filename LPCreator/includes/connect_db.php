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
$username = "radley";
$password = "1Animation2";
$db_name = "custompapercup";

$email = "";


$can_log_in = false;

// sanitize the inputs
if(isset($_POST['email']) && isset($_POST['password'])){
    // create connection object
    $conn = new mysqli($host, $username, $password, $db_name);
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


//    echo $email . "<br>";
//    echo "radmation@yahoo.com<br>";
//    echo "animation1" . "<br>";
//    echo $password . " END --  ";

    $sql = "SELECT * FROM Users";

    $result = $conn->query($sql);

    $can_log_in = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $can_log_in = 1;
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    


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

echo json_encode($response_array); // return => {"logged_in" : "error"}

$response_array['logged_in'] = null;

unset($_POST['email'] );
unset($_POST['password'] );
