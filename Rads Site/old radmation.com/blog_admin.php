<?php

//this page lists all the blogs with the show update and delete
ob_start();
session_start();
$title = "Blog";
include("templates/header.php");
include("templates/nav.php");
include("templates/side_nav.php");

if( ! isset($_SESSION['admin'])) //if session is null show must log in
{
    echo "Please Log in to view page";
    $_SESSION['message'] = "Please login to edit blog data.";
    ob_clean();
    header("Location: login.php?&message=login");


}


$blog_id=$_POST['blog_id'];

$msg = $_GET['msg'];
if($msg == 'delete')
    $msg = "Record was deleted Successfully";
else
    $msg = "";

include("utilities/database_connect.php");

echo $msg;

?>

<div class="super-container full-width" id="content">
    <div class="container">
    <div class="sixteen columns">


    <h1>Manage Blogs</h1>
    <a class='article_link' href='blog_new.php'>Create a new blog</a>
    <hr />

    <div class="row">
        <div class="two columns">Title</div>
        <div class="two columns">Author</div>
        <div class="six columns">Content</div>
        <div class="two columns">Published Date</div>
        <div class="one column">Show</div>
        <div class="one column">Update</div>
        <div class="one column">Delete</div>
    </div>

        <?php
        if($message){
            echo"<h6>$message</h6>";
        }
        $query = "SELECT blog_id, title, author, content, published FROM blogs";
        if ($result = $mysqli->query($query)) {

            echo "<tr>";
            while ($obj = $result->fetch_object()) {
                echo    "<hr />
                 <div class='two columns'>$obj->title</div>
                 <div class='two columns'>$obj->author</div>
                 <div class='six columns'>$obj->content</div>
                 <div class='two columns'>$obj->published</div>
                 <div class='one column' ><a class='button' href = 'blog_show.php?blog_id=$obj->blog_id'>Show</a></div>
                 <div class='one column' ><a class='button' href = 'blog_edit.php?blog_id=$obj->blog_id'>Update</a></div>
                 <div class='one column' ><a class='button' href = 'blog_delete.php?blog_id=$obj->blog_id'>Delete</a></div>
                 </tr>";
            }

            echo "</tr>";
            $result->close();
        }
        //list method creates an associative array --
        ?>
    </div>    </div>    </div>

<?php
include("templates/footer.php");
?>