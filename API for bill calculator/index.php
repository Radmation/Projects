<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>


<div id="Sign-In">
    <fieldset style="width:30%">
        <legend>LOG-IN HERE</legend>
        <form method="POST" action="connectivity.php">
            User <br>
            <input type="text" name="user" size="40"><br>
            Password<br>
            <input type="password" name="pass" size="40"><br>
            <input id="button" type="submit" name="submit" value="Log-In">
        </form>
    </fieldset>
</div>

Read more: http://mrbool.com/how-to-create-a-login-page-with-php-and-mysql/28656#ixzz3t72VTB1Z


</body>
</html>