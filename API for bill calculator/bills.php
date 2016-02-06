<?php
//check to see if user is logged in
// Start the session
session_start();


if(isset($_SESSION['user_name'])) {
// check time out here
}
else { // not set so redirect - todo: perhaps pass message...
    header("Location: http://www.radmation.com/bills/index.php"); //login page
}
echo $_SESSION['user_name'];
?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Your Bills</title>
</head>
<body>

<h1>YOUR BILLS ARE HERE</h1>

<?php
 echo time(); //1449012249
?>

</body>
</html>