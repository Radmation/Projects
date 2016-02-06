<?php
/**
 * Created by PhpStorm.
 * User: Radmation
 * Date: 2/15/14
 * Time: 4:33 PM
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

//create a new variable called $message
$message = "";
//take my $db variable which is equal to hte instance of the mysqli class and show an error if there is one
$db = new mysqli("localhost","nucniyex_rad", "s3bw9vW0A6", "nucniyex_awesome");
    if($bd->connect_error){
        $message = $bd->connect_error;
    }
    else{
        $sql='SELECT * FROM blogs'; //query the database - select all from blogs table
        $result = $db->query($sql); // create variable and set it equal to $db query the database query which takes a parameter $sql
        if($db->error){
            $message = $db->error;   //if there is an error show it
        }
    }

?>