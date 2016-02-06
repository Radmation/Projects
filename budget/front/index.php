<!DOCTYPE html>
<html>
<head>
    <title>SimpleTODO</title>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">



</head>
<body>

<div class="container-fluid" id="header">
    <h3>Simple API Front End</h3>
</div>


<!-- form posts to login.php -->
<!-- LOGIN.PHP stores the username and password into session variables -->
<!-- LOGIN.PHP redirects to todo.php which creates a new instance of apicaller.php (which takes the parameters through
 todo: the constructor -- app_id app_password and api_url) then I call a function sendRequest which takes an array sendRequest(_array)
 todo: which returns the bill items as json -->
<?php
session_destroy();
?>
<div class="container" id="login">

    <div class="col-md-4">
        <form class="form-stacked" method="POST" action="login.php">
            <div class="row">
                <div class="form-group">
                    <label for="login_username">Username:</label>
                    <input class="form-control" type="text" id="login_username" name="login_username" placeholder="username">
                </div>

                <div class="form-group">
                    <label for="login_password">Password:</label>
                    <input class="form-control"  type="password" id="login_password" name="login_password" placeholder="password">
                </div>
            </div>
            <div class="form-group actions">
                <button type="submit" name="login_submit" class="btn btn-primary large">Login or Register</button>
            </div>
        </form>
    </div>




</div>
</body>
</html>