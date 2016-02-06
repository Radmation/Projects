<?php
header('Content-type: application/json'); // its json


include_once 'apicaller.php';
session_start();



$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'http://radmation.com/budget/');

$bill_items = $apicaller->sendRequest(array(
    'controller' => 'bill', // this is used in the index as the controller
    'action' => 'read', //this is used in the index params as action
    'username' => $_SESSION['username'],
    'userpass' => $_SESSION['userpass']
));

//echo '';
echo $bill_items;