<?php
/**
 * Created by PhpStorm.
 * User: Radley
 * Date: 12/3/2015
 * Time: 6:19 PM
 */


require 'connect.php';


$is_gain = $_GET['is_gain']; // bill name/type todo add me
$bill_name = $_GET['bill_name']; // bill name/type todo change me from bill type
$frequency = $_GET['frequency']; // how often todo SINGLE WEEKLY BI-WEEKLY MONTHLY
$due_period = $_GET['due_period']; // how often todo enum('eom','bom')
$every_x_days = $_GET['every_x_days']; // how often todo int add me
$on_the_x = $_GET['on_the_x']; // how often todo int add me
$amount = $_GET['amount']; // dollar amount

$user_id = SignUserIn('radley', 'radley123');
echo $user_id;
if( SignUserIn('radley', 'radley123')!= 0 ) {


    $gain = ($is_gain === true);
    echo $gain;

    $added_bill = AddBill(1, $is_gain, $bill_name, $frequency, $due_period, $every_x_days, $on_the_x ,$amount);
} else {

}




