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
function SignIn()
{
    session_start();
//starting the session for user profile page
    // TODO: clean to prevent against sql injection
    if (!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
        $query = mysql_query("SELECT * FROM UserName where user_name = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
        $row = mysql_fetch_array($query) or die(mysql_error());

        if (!empty($row['user_name']) AND !empty($row['pass']))
        {
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['expire_time'] = time() + ( 0 * 0 * 0 * 60 ); // 60 minutes
            header('Location: http://www.radmation.com/bills/bills.php');
            exit;
        } else
        {
            echo "SORRY... YOU ENTERED WRONG ID AND PASSWORD... PLEASE RETRY...";
        }
    }
}

if( isset( $_POST['submit'] ) ) //check to see if login was submitted
{
    SignIn();
}

