<?php
ob_start();
$title = "New Article";

include("templates/header.php");
include("templates/nav.php");
include("templates/side_nav.php");
include("utilities/database_connect.php");


$nameFirst = $mysqli->real_escape_string($_POST['nameFirst']);
$nameLast = $mysqli->real_escape_string($_POST['nameLast']);
$email = $mysqli->real_escape_string($_POST['email']);
$newsletter=$_POST['newsletter'];
$products=$_POST['products'];

$submit = $_POST['submit'];

if ($submit) {
    $sql = "INSERT INTO newsletter (customer_id, nameFirst, nameLast, email, newsletter, products)
    VALUES (NULL, '$nameFirst', '$nameLast', '$email', '$newsletter', '$products' )";
    $result = $mysqli->query($sql);

    mysqli_close($mysqli);
    ob_clean();
    header("Location: news_subscriptions.php");
}

$new_article = <<<NB

    <div id="main">
        <form method="POST" action="subscriber_new.php">
            <p><input type="text" name="nameFirst" value="$nameFirst" placeholder="First Name" autofocus></p>
            <p><input type="text" name="nameLast" value="$nameLast" placeholder="Last Name"></p>
            <p><input type="text" name="email" value="$email" placeholder="Email"></p>
            <p><input type="checkbox" name="newsletter" value="1" placeholder="Newsletter">Newsletter</p>
            <p><input type="checkbox" name="products" value="1" placeholder="Products">Products</p>
            <p><input type="submit" name="submit" value="submit"></p>
        </form>
    </div>

NB;
echo $new_article;


include("templates/footer.php");

ob_end_flush();