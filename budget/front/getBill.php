<?php
/**
 * Created by PhpStorm.
 * User: Radley
 * Date: 12/15/2015
 * Time: 8:18 PM
 */
header('Content-type: application/json'); // its json


include_once 'apicaller.php';
session_start();



$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'http://radmation.com/budget/');

$bill_item = $apicaller->sendRequest(array(
    'controller' => 'bill', // this is used in the index as the controller
    'action' => 'read', //this is used in the index params as action
    'username' => $_SESSION['username'],
    'userpass' => $_SESSION['userpass'],
    'bill_id' => '112'
));

//echo '';
echo $bill_item;