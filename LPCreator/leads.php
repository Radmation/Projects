<?php
session_start();
//
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

} else {
    $_SESSION['message'] = "You have to be logged in to view that page.";
    header('Location: http://charterschoollocator.com/login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

    <title>Option 1 Option 2</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/leads.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>


<nav class="navbar navbar-default navbar-fixed-top" id="nav-bar">

    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img src="../../_images/logo.png" class="img-responsive">

            </a>
        </div>
        <p class="navbar-text navbar-right pad-right">
            <a href="#" class="navbar-link">
            </a> <!-- $_SESSION['username']; -->
        </p>
    </div>
</nav>


<div class="container">
    <form>
        <table class="table table-bordered table-hover">


            <thead>
            <tr>
                <th>Export</th>
                <th>Id</th>
                <th>Lead Date</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Zip Code</th>
                <th>Been Exported?</th>
            </tr>
            </thead>

            <tbody>
            <?php
                // echo out all the rows here <tr><td> STUFF </td> <td> STUFF </td> <td> STUFF </td> <td> STUFF </td> </td>
            $servername = "localhost_";
            $username = "username_";
            $password = "password_";
            $dbname = "myDB_";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM TBLName"; // add conditional clause?
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>" .
                        "<td><input type='checkbox' name='exported[]' value='" . $row["id"] ."'</td>".
                        "<td>" . $row["id"] . "</td>".
                        "<td>" . $row["leadDate"] . "</td>".
                        "<td>" . $row["firstName"] . "</td>".
                        "<td>" . $row["lastName"] . "</td>".
                        "<td>" . $row["email"] . "</td>".
                        "<td>" . $row["phone"] . "</td>".
                        "<td>" . $row["address"] . "</td>".
                        "<td>" . $row["zip"] . "</td>".
                        "<td>" . $row["exported"] . "</td>".
                        "</tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>


            <tr>
                <td><input type="checkbox" name="exported[]" value=""></td><!-- make value the id? -->
                <td>Test</td>
                <td>Test</td>
                <td>Test</td>
                <td>Test</td>
                <td>Test</td>
                <td>Test</td>
                <td>Test</td>
                <td>Test</td>
                <td>Test</td>
            </tr>
            </tbody>
        </table>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Export To CSV">
        </div>

    </form>

</div>

<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>

<!-- validation -->
<script src="/js/jquery.validate.min.js"></script><!-- for form validation -->
<script src="/js/additional-methods.min.js"></script><!-- for US phone number validation -->
<script src="/js/validate.js"></script><!-- my validation-->

</body>
</html>

