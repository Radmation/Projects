<?php
ob_start();

include("utilities/blog2.php");
include("templates/header.php");
include("templates/nav.php");
include("templates/side_nav.php");

$customer_id = $_GET['customer_id'];
$sql = "SELECT * FROM newsletter WHERE customer_id='$customer_id'";
$result = $db->query($sql);
list( $customer_id,$firstname,$lastname, $email, $newsletter, $products) = $result->fetch_row();


$submit = $_POST['submit'];

if ($submit) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $newsletter = $_POST['newsletter'];
    $products = $_POST['products'];
    $sql = "UPDATE newsletter SET nameFirst='$firstname', nameLast='$lastname', email='$email', newsletter='$newsletter', products='$products' WHERE customer_id='$customer_id'";
    $result = $db->query($sql);
    echo $sql;    ob_clean();
    header("Location: news_subscriptions.php");
}


$update = <<<COW
            <form method="post" action="subscriber_update.php?customer_id=$customer_id">
            <p><input name="firstname" value="$firstname">First Name</p>
            <p><input name="lastname" value="$lastname">Last Name</p>
            <p><input name="email" value="$email">Email</p>
            <p><input type="checkbox" name="newsletter" value="1">Newsletter</p>
            <p><input type="checkbox" name="products" value="1">Products</p>

            <input type="submit" name="submit" value="submit"/>
            </form>
COW;

echo $update;
ob_end_flush();
