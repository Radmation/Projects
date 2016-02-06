<?php
/**
 * Created by PhpStorm.
 * User: Radmation
 * Date: 2/20/14
 * Time: 12:30 PM
 */
ob_start();
$title = "Delete Blog";
include("templates/header.php");
include("templates/nav.php");
include("templates/side_nav.php");
include("utilities/blog2.php");

$blog_id=$_GET['blog_id'];



    $sql = "DELETE FROM blogs WHERE blog_id=$blog_id";
    $result = $db->query($sql);
    $now = time();
    ob_clean();
    header("Location: blog_list.php?t=$now&msg=delete");




if($db->error){
    $message = $db-> error;
}
ob_end_flush();
?>

