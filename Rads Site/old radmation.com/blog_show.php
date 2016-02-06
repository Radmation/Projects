<?php

//this page shows the comments
$title = "Blog Post";
include("templates/header.php");
include("templates/nav.php");
include("utilities/database_connect.php");
include("utilities/utilities.php");

$blog_id=$_GET['blog_id'];

$sql = "SELECT AVG(rating) FROM comments WHERE blog_id=$blog_id"; //this is used to get the average rating
$result = $mysqli->query($sql);
list($average_rating) = $result->fetch_row();
$average_rating_stars = ratingStars($average_rating);

if($db->error){
    $message = $db-> error;
};
?>

<!--all links to edit and show information in form to edit the result post will UPDATE the
existing blog in the database -->

    <div class="super-container full-width" id="blog-post">
        <div class="container">




<?php



$query = "SELECT * FROM blogs WHERE blog_id=$blog_id";

if ($result = $mysqli->query($query)) {

    while ($obj = $result->fetch_object()) {
        $date = date($obj->published);

        echo   "
                <div class='sixteen columns blog-title'><h4>$obj->title</h4> <br/>$date</div>
                <hr>
                <div class='sixteen columns blog-content'>$obj->content </div>";
    }
    /* free result set */

    $result->close();
}
?>
    </div>
</div>



<!--<div class="super-container full-width" id="">-->
<!--    <div class="container">-->
<!--<hr>-->
<!--        <div class="sixteen columns">-->
<!--            <h4 class="title center">Comments</h4>-->
<!--            <h5 class="center">Read others thoughts or leave your own. </h5>-->
<!--        </div>-->
<!---->
<!--        <div class="twelve columns"><hr></div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--    <div class="super-container full-width" id="">-->
<!--        <div class="container">-->
<!---->
<!--        <table class="u-full-width">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th>Author</th>-->
<!--                <th>Opinion</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->


<?php
//$query = "SELECT * FROM comments WHERE blog_id=$blog_id";
//$result = $mysqli->query($query);
//
//while (list($comment_id, $c_author, $c_date, $rating, $blog_id) = $result->fetch_row()){
//    $rating_stars = ratingStars($rating);
//    echo "<tr>
//
//            <td>$c_author</td>
//            <td>$c_date</td></tr>"; //$c_date is the comment FIX THIS
//}
//?>
<!--        </tbody>-->
<!--        </table>-->
<!---->
<!---->
<!--    </div>-->
<!---->
<!--</div>-->
<!---->
<!---->
<!--<div class="super-container full-width" id="">-->
<!--    <div class="container">-->


<?php
//$blog_id=$_GET['blog_id'];
//$new_comment = <<<NC
//<div class="sixteen columns"><h4>Submit a Comment</h4></div>
//<form method="POST" class="four columns" action="comment_new.php">
//    <input type="hidden" name="blog_id" id="blog_id" value="$blog_id">
//    <input class="input" type="text" name="c_author" value="$c_author" placeholder="author"><br>
//    <textarea class="input" name="comment" rows="10" cols="30" placeholder="comment">$comment</textarea>
//    <input class="input button" type="submit" name="submit" value="Submit Comment">
//</form>
//
//</div>
//</div>
//
//
//NC;
//echo $new_comment;



include("templates/footer.php");
