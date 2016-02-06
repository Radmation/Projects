
<div class="super-container full-width" id="footer">
    <div class="container">


        <div id="nav_foot" class="twelve columns">
            <ul id="footer_nav_ul">
                <li><a href="/blog_list.php" class="greentext">Blogs</a></li>
                <li><a href="/index.php" class="greentext">Home</a></li>
                <li><a href="/index.php" class="greentext">Get In Touch</a></li>

                <?php
                if(isset( $_SESSION['admin']) )
                {
                    echo '<li><a href="/logout.php" class="greentext button button-primary">Logout</a></li>';
                }
                else
                    echo '<li><a href="/login.php" class="greentext button button-primary">Login</a></li>';
                ?>
            </ul>
            <div class="twelve columns"><a href="index.php"><img class="footlogo" src="/images/radmationmountains.png"></a></div>
            <div class="twelve columns"><p class="textwhite center">© Copyright 2014, Radley Anaya. Design by Radley Anaya.</p></div>
        </div>


    </div>
</div>




	
	</body>
</html>	