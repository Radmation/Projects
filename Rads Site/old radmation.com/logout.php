<?php

session_start();
$_SESSION['admin'] = null;
header("Location: blog.php");
$title = "Login";
include("templates/header.php");
include("templates/nav.php");
include("templates/side_nav.php");








include("templates/footer.php");
?>