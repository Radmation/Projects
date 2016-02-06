<?php

//this page lists all the blogs with the show update and delete
ob_start();
session_start();
$title = "Blog";
include("templates/header.php");
include("templates/nav.php");
include("templates/side_nav.php");
include("utilities/database_connect.php");

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




?>
    <h1>Manage Subscribers</h1>
    <a href="subscriber_new.php" class="article_link">Add a Subscriber</a>

    <table cellpadding = '0' cellspacing = '0' id="blog_table">
        <tr>
            <td id = 'blog_id'>ID</td>
            <td id = 'blog_title'>First Name</td>
            <td id = 'blog_author'>Last Name</td>
            <td id = 'blog_content'>Email</td>
            <td id = 'blog_published'>Newsletter Subscriber</td>
            <td id = 'blog_published'>Products Subscriber</td>
            <td id = 'blog_published'>Update</td>
            <td id = 'blog_published'>Delete</td>
        </tr>
        <?php
        if($message){
            echo"<h6>$message</h6>";
        }
        $query = "SELECT * FROM newsletter";
        if ($result = $mysqli->query($query)) {

            echo "<tr>";
            while ($obj = $result->fetch_object()) {
                echo"<td class ='blog_stuff'>$obj->customer_id</td>
                 <td class ='blog_stuff'>$obj->nameFirst</td>
                 <td class ='blog_stuff'>$obj->nameLast</td>
                 <td class ='blog_stuff'>$obj->email</td>
                 <td class ='blog_stuff'>$obj->newsletter</td>
                 <td class ='blog_stuff'>$obj->products</td>
                 <td class ='blog_stuff' ><a class='link' href = 'subscriber_update.php?customer_id=$obj->customer_id'>Update</td>
                 <td class ='blog_stuff' ><a class='link' href = 'subscriber_delete.php?customer_id=$obj->customer_id'>Delete</td>
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