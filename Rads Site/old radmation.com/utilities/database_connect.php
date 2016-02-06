<?php
/**
 * Created by PhpStorm.
 * User: Radmation
* Date: 2/15/14
* Time: 9:08 PM
*/
$error_message ="";
//create a new instance of the mysqli class which accepts 4 parameters, host name, username, password, database name
$mysqli = new mysqli("localhost","nucniyex_rad", "s3bw9vW0A6", "nucniyex_awesome");
      //new mysqli("mysql.sortingsolutionsusa.com","radmation", "Animation1", "awesomedatabase");  BACKUP FOR ALL
//if database has a connection error pass it into $db and set error_message to $dbconnect error else write DB connected successfully
if($db->connect-error)
    $error_message = $bd->connect-error;
else
    $message_error = "db connected successfully";


//show whatever is assigned to $message_error, whether that be and error or my 'db connected' message in an h3
if ($message_error != "db connected successfully"){
    echo "<p>$message_error</p>";
}
?>