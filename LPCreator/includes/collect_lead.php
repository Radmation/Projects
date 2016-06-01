<?php
/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/31/2016
 * Time: 11:24 AM
 */
$firstName = "";
$lastName = "";
$email = "";
$phone = "";
$address = "";
$zip = "";

if( !isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['email'])  || !isset($_POST['phone']) || !isset($_POST['address']) || !isset($_POST['zip']) ) {
    // failed
} else {
    // lead data came through okay - insert into db or excel form

    // connect to db
    $host = "localhost_";
    $username = "charterschool_";
    $password = "sZ58ybemktbW_";
    $dbname = "myDB_";

    // create connection object
    $conn = new mysqli($host, $username, $password, $dbname);

    // sanitize the inputs
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);

    $sql = "INSERT INTO TABLENAME (firstName, lastName, email, phone, address, zip)
              VALUES ('$firstName', '$lastName', '$email', '$phone', '$address', '$zip')";

    if ($conn->query($sql) === TRUE) {
        // worked
        echo "New record created successfully";
    } else {
        // failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // close the connection
    $conn->close();
}

// redirect thank you page