<?php

//this page lists all the blogs with the show update and delete
ob_start();
session_start();
$title = "Blog";
include("templates/header.php");
include("templates/nav.php");



$blog_id=$_POST['blog_id'];

$msg = $_GET['msg'];
if($msg == 'delete')
    $msg = "Record was deleted Successfully";
else
    $msg = "";

include("utilities/database_connect.php");

echo $msg;

?>

    <div class="super-container full-width" id="statement">
        <div class="container">
            <hr>
            <h2 class="center">Blogs</h2>
            <h5 class="center">Read some of my blogs that interest you.</h5>
            <hr>
        </div>
    </div>


<div class="super-container full-width" id="content">
        <div class="container">

            <table class="u-full-width">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Full Post</th>
                </tr>
                </thead>
                <tbody>





<?php
    if($message){
        echo"<h6>$message</h6>";
    }
    $query = "SELECT blog_id, title, author, content, published FROM blogs";
    if ($result = $mysqli->query($query)) {



        while ($obj = $result->fetch_object()) {
            $content = $obj->content;
            for ($i = 0; $i <= 200; $i++) {
                $message .= $content[$i];
            }
            $message .= "...";
        echo    "
             <tr>
             <td>$obj->title</td>
             <td>$message</td>
             <td>$obj->published</td>
             <td><a class='button' href = 'blog_show.php?blog_id=$obj->blog_id'>Show</a></td></tr>
             ";
        }

        $result->close();
    }
        //list method creates an associative array --
?>

                </tbody>
            </table>

    </div>
</div>

<?php
include("templates/footer.php");
?>