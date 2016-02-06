<?php

ob_start();


$title = "Login";
include("templates/header.php");
include("templates/nav.php");
include("utilities/database_connect.php");

$username = $mysqli->real_escape_string($_POST['username']); //need to put this around everything all the time
$password = $mysqli->real_escape_string($_POST['password']); //escapes quotes !!!
$submit = $_POST['submit'];

$password = sha1($password); //sha1() encrypts a string.

//$mysqli->real_escape_string($username);

if( $submit){
    $sql = "SELECT * FROM users WHERE name='$username' AND password='$password'";
    $result = $mysqli->query($sql);
    list($user_id, $name, $password) = $result->fetch_row();
    if($user_id){
        echo "You are successfully logged in.";
        //$_SESSION['username'] = $username;
        $_SESSION['admin'] = $username;
        ob_clean();
        header("Location: blog_admin.php");
    }
    else{
        echo "Your username or password are incorrect.";
    }
}

$message = $_GET['message'];
if($message == "login")
    $message = "Please Log on to edit blogs.";
else
    $message = "";
echo $message;
?>

    <div class="super-container full-width" id="statement">

        <div class="container">
            <hr>
            <h2 class="heading center">Login</h2>
            <h5 class="center">Hi Radley, go ahead and do your thing.</h5>
            <hr>
        </div>

    </div>

<div class="super-container full-width">
    <div class="container">






<?
echo"<div class='three columns offset-by-two padding-top'>";

echo <<<EOL


<form method="POST" action="login.php">
    <input type="text" name="username" value"" id="name" placeholder="username"d><br>
    <input type="password" name="password" id="password" value="" placeholder="password">
    <input type="submit" name="submit" value="Login">
</form>
</div>
</div>
</div>
EOL;

include("templates/footer.php");


