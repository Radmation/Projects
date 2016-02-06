<?php
/**
 * Created by PhpStorm.
 * User: Radmation
 * Date: 2/20/14
 * Time: 12:30 PM
 */
ob_start();
include("templates/header.php");
include("templates/nav.php");
include("templates/side_nav.php");
include("utilities/blog2.php");

$customer_id=$_GET['customer_id'];



$sql = "DELETE FROM newsletter WHERE customer_id=$customer_id";
$result = $db->query($sql);
$now = time();
ob_clean();
header("Location: news_subscriptions.php");




if($db->error){
    $message = $db-> error;
}
ob_end_flush();
?>

