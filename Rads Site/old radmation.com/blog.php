<?php
$title = "Blog";
include("templates/header.php");
include("templates/nav.php");



?>

<?php
include("utilities/database_connect.php");
?>

<div class="super-container full-width" id="content">
    <div class="container">

<div class="sixteen columns">
    <h2 class = 'page_title'>Blogs</h2>
    <h4><a class='link' href = '/blog_list.php'>List All Blogs</a></h4>

</div>
        <?php
        if($message){
            echo"<h6>$message</h6>";
        }

        $query = "SELECT title, author, content, published FROM blogs ORDER BY blog_id DESC LIMIT 1 ";

        if ($result = $mysqli->query($query)) {

            while ($obj = $result->fetch_object()) {
                echo    "<div class ='two columns'>$obj->title</div>
                        <div class='ten columns'>$obj->content</div>
                        <div class ='four columns'>$obj->published</div>";
            }
            /* free result set */
            $result->close();
        }
        ?>


</div>
    </div>



<?php
include("templates/footer.php");
?>