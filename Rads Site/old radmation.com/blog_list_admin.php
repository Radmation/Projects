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


    <table cellpadding = '0' cellspacing = '0' id="blog_table">
        <tr>
            <td id = 'blog_id'>ID</td>
            <td id = 'blog_title'>Title</td>
            <td id = 'blog_author'>Author</td>
            <td id = 'blog_content'>Content</td>
            <td id = 'blog_published'>Published Date</td>
            <td id = 'blog_published'>Show</td>
            <td id = 'blog_published'>Update</td>
            <td id = 'blog_published'>Delete</td>
        </tr>
        <?php
        if($message){
            echo"<h6>$message</h6>";
        }
        $query = "SELECT blog_id, title, author, content, published FROM blogs";
        if ($result = $mysqli->query($query)) {

            echo "<tr>";
            while ($obj = $result->fetch_object()) {
                echo    "<td class ='blog_stuff'>$obj->blog_id</td>
                 <td class ='blog_stuff'>$obj->title</td>
                 <td class ='blog_stuff'>$obj->author</td>
                 <td class ='blog_stuff'>$obj->content</td>
                 <td class ='blog_stuff'>$obj->published</td>
                 <td class ='blog_stuff' ><a class='link' href = 'blog_show.php?blog_id=$obj->blog_id'>Show</td>
                 <td class ='blog_stuff' ><a class='link' href = 'blog_edit.php?blog_id=$obj->blog_id'>Update</td>
                 <td class ='blog_stuff' ><a class='link' href = 'blog_delete.php?blog_id=$obj->blog_id'>Delete</td>
                 </tr>";
            }

            echo "</tr>";
            $result->close();
        }
        //list method creates an associative array --
        ?>
    </table>

<?php
include("templates/footer.php");
?>