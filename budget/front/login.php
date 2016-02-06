<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Radley
 * Date: 12/9/2015
 * Time: 8:48 PM
 */
//get the form values
$username = $_POST['login_username'];
$userpass = $_POST['login_password'];


session_start();
$_SESSION['username'] = $username;
$_SESSION['userpass'] = $userpass;


header('Location: getUser.php');
exit();