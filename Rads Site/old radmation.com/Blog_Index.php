<?php
//this is the page the user sees need the show on it which will show comments
$title = "Blog";
include("templates/header.php");
include("templates/nav.php");
include("templates/side_nav.php");


$blog_id=$_POST['blog_id'];

include("utilities/database_connect.php");
?>
    <table cellpadding = '0' cellspacing = '0' id="blog_table">
        <tr>
            <td id = 'blog_title'>Title</td>
            <td id = 'blog_author'>Author</td>
            <td id = 'blog_content'>Content</td>
            <td id = 'blog_published'>Published Date</td>
            <td id = 'blog_published'>Show</td>
        </tr>
        <?php
        if($message){
            echo"<h6>$message</h6>";
        }
        $query = "SELECT blog_id, title, author, content, published FROM blogs";
        if ($result = $mysqli->query($query)) {

            echo "<tr>";
            while ($obj = $result->fetch_object()) {
                echo    "
                 <td class ='blog_stuff'>$obj->title</td>
                 <td class ='blog_stuff'>$obj->author</td>
                 <td class ='blog_stuff'>$obj->content</td>
                 <td class ='blog_stuff'>$obj->published</td>
                 <td class ='blog_stuff' ><a class='link' href = 'blog_show.php?blog_id=$obj->blog_id'>Show</td>
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