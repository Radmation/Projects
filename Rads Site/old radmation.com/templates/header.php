<?php
session_start();
$title = "Home - radmation"
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <title><?php echo $title ?></title>
    <meta charset="UTF-8"/>
    <meta name="description" content="Radley Anaya's homebase on the internet, where you can find my recent projects and get in touch with me.">
    <meta name="author" content="Radley Anaya">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/skeleton.css">
    <link rel="stylesheet" href="/css/my_styles.css">

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/ico" href="/images/favicon (1).ico" />

</head>

<body>


<div class="super-container full-width" id="header">
    <div class="container">

        <div class="sixteen columns">

            <div class="row">

                <div class="two columns">
                    <a href="/index.php"><img id="headerImg" src="/images/radmationlogowhite.png"/></a>
                </div>


                <div id="nav" class="six columns offset-by-four">
                    <ul>
                        <li><a class="greentext" href="/blog_list.php"> Blogs    </a></li> <!--<img src="/images/trans.png" class="nav-sprite" id="blog">  -->
                        <li><a class="greentext" href="/index.php"> Home </a> </li> <!-- <img src="/images/trans.png" class="nav-sprite" id="home">  -->
                        <li><a class="greentext" href="/contact.php"> Get In Touch </a> </li> <!-- <img src="/images/trans.png" class="nav-sprite" id="home">  -->
                        <?php
                        if(isset( $_SESSION['admin']) )
                        {
                            echo '<li><a class="greentext button button-primary" href="/logout.php">  Logout  </a></li>'; // <img src="/images/trans.png" class="nav-sprite" id="logout">
                        }
                        else
                            echo '<li><a class="greentext button button-primary" href="/login.php">  Login  </a></li>'; //<img src="/images/trans.png" class="nav-sprite" id="login">
                        ?>
                    </ul>
                </div>

            </div>

        </div>

    </div>
</div>
