<?php
// start the session
session_start();
//// remove all session variables - for user
//session_unset();
//// destroy the session - for user
//session_destroy();

//error_reporting(E_ALL); ini_set('display_errors', 'On');

$allowed_count = 5;

/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Date: 5/27/2016
 * Time: 11:06 AM
 */




$email = "";


// CHECK THE USERS IP TO MAKE SURE IT IS WHITE-LISTED

$account_locked = 0;
$can_log_in = 0;

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


    // if login failed -> record failed time and add one to failed attempts

    // select every record from users where password and username match
    $sql = "SELECT * FROM Users WHERE email = '$email' and password = '$password'";
    $result = $conn->query($sql);

    $can_log_in = 0;

    // if pass and email match
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            // check if the account is enabled
            $enabled = $row['enabled'];
            //echo $enabled;
            if($enabled == 1) {
                $can_log_in = 1;
            } else {
                //echo "CANNOT LOG IN";
                $account_locked = 1;
                $can_log_in = 0;

            }
        }
        if($can_log_in == 1) {
            // reset failed attempts to 0
            $sql = "UPDATE Users SET failed_attempts = 0 WHERE email='$email'";
            if ($conn->query($sql) === TRUE) {
                //echo "Record updated successfully";
            } else {
                // echo "Error updating record: " . $conn->error;
            }
        }

    } else {

        // ********************
        //   login failed here
        // ********************

        // check if that email user is in the db
        $sql = "SELECT * FROM Users WHERE email = '$email'";
        $result = $conn->query($sql);
        // if the user is in the db
        if ($result->num_rows > 0) {
            // update the timestamp for last failed login to now
            $sql = "UPDATE Users SET last_failed_login=NOW() WHERE email='$email'";
            if ($conn->query($sql) === TRUE) {
                //echo "Record updated successfully";
            } else {
                //echo "Error updating record: " . $conn->error;
            }

            // increment the failed login int by 1
            $sql = "UPDATE Users SET failed_attempts = failed_attempts + 1 WHERE email='$email'";
            if ($conn->query($sql) === TRUE) {
                //echo "Record updated successfully";
            } else {
                //echo "Error updating record: " . $conn->error;
            }

            // check if account needs locked out
            $sql = "SELECT failed_attempts FROM Users WHERE email = '$email'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {

                if($row['failed_attempts'] > $allowed_count ) {
                    $sql = "UPDATE Users SET enabled = 0 WHERE email='$email'";
                    if ($conn->query($sql) === TRUE) {
                        $account_locked = 1;
                        //echo "Record updated successfully";
                    } else {
                        //echo "Error updating record: " . $conn->error;
                    }
                }

            }

        } // end if user found for failure
    }


    $conn->close();


} else {
    $can_log_in = 0;
}



if($can_log_in == 1) {
    $_SESSION['logged_in'] = true; // set session vars
    $_SESSION['email'] = $email; // set session vars
    header('Location: ../creator.php'); // redirect to creator page
    die();
} else {
    unset( $_SESSION['logged_in'] );
    // check messages
    if($account_locked == 1) {
        $_SESSION['message'] = "Your Account Is Locked Out. Contact the Site Admin to Unlock Account.";
    } else {
        $_SESSION['message'] = "Login Failed. Please try again.";
    }

    header('Location: ../login.php');
    die();

}

