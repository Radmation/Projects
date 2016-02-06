<?php
ob_start();

include("utilities/blog2.php");
include("templates/header.php");
include("templates/nav.php");

$blog_id = $_GET['blog_id'];
$sql = "SELECT * FROM blogs WHERE blog_id='$blog_id'";
$result = $db->query($sql);
list( $blog_id,$title, $author,$content, $published) = $result->fetch_row();


$submit = $_POST['submit'];

if($submit) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $sql = "UPDATE blogs SET title='$title', author='$author', content='$content' WHERE blog_id=$blog_id;";
    $result = $db->query($sql);
    ob_clean();
    header("Location: blog_show.php?blog_id=$blog_id");
}


$update_blog =  <<<COW
            <div class="super-container full-width" id="blog_edit">
                <div class="container">
                    <div class="sixteen columns">

            <form method="post" action='blog_edit.php?blog_id=$blog_id'>
            <p><input name="title" value="$title"></p>
            <p><input name="author" value="$author"></p>
            <p><textarea name="content">$content</textarea></p>

            <input type="submit" name="submit" value="submit"/>
            </form>

            </div></div></div>

COW;

echo $update_blog;
ob_end_flush();
?>