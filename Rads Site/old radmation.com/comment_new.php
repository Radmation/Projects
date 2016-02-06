<?php
ob_start();
$title = "New Comment";
include("templates/header.php");
include("templates/nav.php");
include("templates/side_nav.php");
include("utilities/database_connect.php");

$c_author = $_POST['c_author'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];
$blog_id = $_POST['blog_id'];
$submit = $_POST['submit'];

echo $blog_id;

echo"blog_id<br>";
If($submit){
    $query = "INSERT INTO comments (comment_id, c_author, comment, c_date, rating, blog_id)
                                VALUES(NULL, '$c_author', '$comment', NULL, '$rating', '$blog_id')";

    $result = $mysqli->query($query);


}
ob_clean();
header("Location: blog_show.php?blog_id=$blog_id");
//echo $query;
ob_end_flush();