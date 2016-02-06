
<div class="super-container full-width" id="side-nav">
    <div class="container">

        <div class="sixteen columns">
            <?php
            if(isset ($_SESSION['admin']))
            {
                echo '<h6><a class = "navi" href="blog_admin.php">Manage Blogs</a></h6>';
                echo '<h6><a class = "navi" href="admin_create.php">Manage Admins</a></h6>';
            }
            ?>
        </div>

    </div>
</div>


