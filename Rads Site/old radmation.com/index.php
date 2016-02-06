<?php
    $title = "Home";
include("templates/header.php");
include("utilities/database_connect.php");


?>

<div class="super-container full-width" id="statement">
    <div class="container">
<hr>
        <h2 class="center">Radley Anaya</h2>
        <h4 class="center">Software Developer</h4>
        <h5 class="center">When an analytical mind and a passion for code come together.</h5>
        <hr>
    </div>
</div>


<div class="super-container full-width" id="content">
    <div class="container">

        <div class="row">

            <div class="six columns">
                <h5 class="heading center">Welcome</h5>
                <p>You've found yourself at the online home of Radley Anaya, a Software Developer based in Spokane, WA. Here you'll find a selection of my latest work, stats about my skills, and some of my blog posts.</p>
                <p>If you've a project or need some extra help, drop me a line at <a href="mailto:radmation@yahoo.com">radmation@yahoo.com</a>. Alternatively you can fill out my contact form in the Get In Touch section.</p>
            </div>

           <div class="six columns">
                <h5 class="heading center">Personal Statement</h5>
                <p>Sees technology as a way of facilitating and improving communication between users, understanding
                that people come before technology.</p>
                <p>A whiz at C#, SQL Server, PHP, HTML5, CSS, and pretty good with ASP.NET, Ruby, Rails, and more...</p>
            </div>


        </div>
<hr>

    </div>
</div>

<div class="super-container full-width" id="projects">
    <div class="container">

        <div class="twelve columns">
            <h4 class="heading center">Sample Projects</h4>
            <p class="center">Click on a project below to go to <a href="https://github.com/Radmation">my github account</a>.  </p>
        </div>


        <div class="row">
        <div class="one-third column">
            <h6 class="center">Save Image to DB</h6>
            <a href="https://github.com/Radmation/Database-Image-Add-2WAYS">
                <img src="images/GitHubPhoneGap.png"/>
            </a>
        </div>

        <div class="one-third column">
            <h6 class="center">ASP.NET Demo Store</h6>
            <a href="https://github.com/Radmation/CookNook-WebSite.git">
                <img src="images/GitHubPhoneGap.png"/>
            </a>
        </div>

        <div class="one-third column">
            <h6 class="center">DeathArena Game</h6>
            <a href="https://github.com/Radmation/DeathArenaGame">
                <img src="images/GitHubPhoneGap.png"/>
            </a>
        </div>
        </div>

    </div>
</div>




<!--Most Recent Article-->
<div class="super-container full-width" id="">
    <div class="container">

        <hr>
        <div class="twelve columns">
            <h4 class="title center">Recent Blogs</h4>



        <?php
        if($message){
            echo"<h6>$message</h6>";
        }
        $query = "SELECT blog_id, title, author, content, published FROM blogs LIMIT 3";
        if ($result = $mysqli->query($query)) {
            $message;
            $content = "";

            $day;
            $month;
            $year;

            while ($obj = $result->fetch_object()) {
                $content = $obj->content;
                for ($i = 0; $i <= 200; $i++) {
                    $message .= $content[$i];
                }
                $message .= "...";

                $date = $obj->published;
                $day = $date[8] . $date[9];
                $month = $date[5] . $date[6];
                $year = $date[0] . $date[1] . $date[2] . $date[3];
                echo    "
                 <div class='twelve columns'>
                    <h6 class='blog-title'><strong>$obj->title</strong> - $month-$day-$year</h6>
                 </div>

                    <div class='twelve columns'>
                        <p>$message</p>
                    </div>
                        <a class='button' href = 'blog_show.php?blog_id=$obj->blog_id'> Full article →</a>
                        <hr>
                 ";
            }

            $result->close();
        }
        ?>


        </div> <!--ends Recent Blog part -->





    </div>
</div><!--Most Recent Article Close-->





<?php
//echo "<h4>Sign Up For Our Newsletter</h4>";
//  include("newsletter_form.php");
include("templates/footer.php");

?>
	
	
