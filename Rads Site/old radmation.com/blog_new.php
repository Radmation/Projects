<?php

ob_start();
session_start();

$title = "New Blog";
include("utilities/blog2.php");
include("templates/header.php");
include("templates/nav.php");

if( ! isset($_SESSION['admin'])) //if session is null show must log in
{
    echo "Please Log in to view page";
    $_SESSION['message'] = "Please login to edit blog data.";
    ob_clean();
    header("Location: login.php?&message=login");


}

$title=$db->real_escape_string($_POST['title']);
$author=$db->real_escape_string($_POST['author']);
$content=$db->real_escape_string($_POST['content']);
$submit=$db->real_escape_string($_POST['submit']);


$submit = $_POST['submit'];

if($submit){
    $sql = "INSERT INTO blogs (blog_id, title, author, content, published)
    VALUES (NULL, '$title', '$author', '$content', NULL )";
    $result = $db->query($sql);
    $new_blog_id = $db->insert_id;
    mysqli_close($db);
    ob_clean();
    header("Location: blog_show.php?blog_id=$new_blog_id");

}


$new_blog = <<<NB

    <div id="main">
        <form method="POST" action="blog_new.php">
            <p><input type="text" name="title" value="$title" placeholder="Blog Title" autofocus></p>
            <p><input type="text" name="author" value="$author" placeholder="Author"></p>
            <p><textarea rows="4" cols="50" name="content">$content</textarea></p>
            <p><input type="submit" name="submit" value="Submit"></p>
        </form>
    </div>

NB;
    echo $new_blog;




include("templates/footer.php");

ob_end_flush();


