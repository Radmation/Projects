<?php
// Start the session
session_start();
define('DB_HOST', 'localhost');
define('DB_NAME', 'nucniyex_bills');
define('DB_USER', 'nucniyex_dev');
define('DB_PASSWORD', '!Animation2');




$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME, $con) or die("Failed to connect to MySQL: " . mysql_error());

/* $ID = $_POST['user']; $Password = $_POST['pass']; */
// SIGNS THE USER IN RETURNS A TRUE
function SignIn()
{
    //clean them here
    session_start();
//starting the session for user profile page
    // TODO: clean to prevent against sql injection
    if (!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
        $query = mysql_query("SELECT * FROM UserName where user_name = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
        $row = mysql_fetch_array($query) or die(mysql_error());

        if (!empty($row['user_name']) AND !empty($row['pass'])) {
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['expire_time'] = time() + (0 * 0 * 0 * 60); // 60 minutes
            header('Location: http://www.radmation.com/bills/bills.php');
            exit;
        } else {
            echo "SORRY... YOU ENTERED WRONG ID AND PASSWORD... PLEASE RETRY...";
        }
    }
}

if (isset($_POST['submit'])) //check to see if login was submitted
{
    SignIn();
}

// RETURNS THE USER ID
function SignUserIn($username, $pass)
{

    $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    $query = "SELECT * FROM UserName where user_name='$username'  AND pass='$pass' ";
    mysql_select_db(DB_NAME);
    $retval = mysql_query($query, $con);

    if (!$retval) {
        die('Could not get data: ' . mysql_error());
    }

    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
//        echo "EMP ID :{$row['user_name']}  <br> ".
//            "EMP NAME : {$row['user_id']} <br> ".
//            "EMP SALARY : {$row['pass']} <br> ".
//            "--------------------------------<br>";
        mysql_close($con);
        return $row['user_id'];
    }
    mysql_close($con);
    return 0;

}
//public $is_gain;
//public $bill_name;
//public $frequency;
//public $due_period;
//public $every_x_days;
//public $on_the_x;
//public $amount;

function GetBill() {

    return true; // return bill
}

// adds bill into DB
function AddBill($user_id, $is_gain, $bill_name, $frequency, $due_period, $every_x_days, $on_the_x, $amount)
{
    //CHECK EACH VALUE AND MAKE SURE THEY ARE VALID

// Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO UserBills (user_id, is_gain, bill_name, frequency, due_period, every_x_days, on_the_x, amount)
            VALUES ('$user_id', '$is_gain', '$bill_name', '$frequency', '$due_period', '$every_x_days', '$on_the_x', '$amount')";

    if ($conn->query($sql) === TRUE) {
//        echo "New record created successfully";
        $conn->close();
        return true;
    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }


}
