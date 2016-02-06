<?php


$title = "contact";
include("utilities/blog2.php");
include("templates/header.php");
include("templates/nav.php");

?>

<?php
$submit = $_POST['submit'];

if($submit) {

    $email_to = "radmation@yahoo.com";
    $email_subject = "Contact Request from Radmation.com!!";

    function died($error) {
        echo "I am sorry, but there were error(s) found with the form you submitted.";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['content'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
    $string_exp = "/^[A-Za-z .'-]+$/";
    if(!preg_match($string_exp,$name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br />';
    }
    if(strlen($content) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br />';
    }
    if(strlen($error_message) > 0) {
        died($error_message);
    }
    $email_message = "Form details below.\n\n";
    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Content: ".clean_string($content)."\n";
    // create email headers
    $headers = 'From: '.$email."\r\n".
        'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!-- include your own success html here -->
    <div class="super-container full-width" id="content">
        <div class="container">
            <div class="sixteen columns"><h4>Thank you for contacting me. I will be in touch with you very soon.</h4></div>
        </div>
    </div>

<?php
}
?>

    <div class="super-container full-width" id="statement">

        <div class="container">
            <hr>
            <h2 class="heading center">Get in Touch</h2>
            <h5 class="center">Go ahead and drop me a line.</h5>
            <hr>
        </div>

    </div>


<div class="super-container full-width padding-top" id="contact">
    <div class="container">
        <div class="three columns">
            <h5>Hi, hows it going?</h5>
            <form method="post" action='contact.php'>

                <label for="name">Name</label>
                <input class="input" type="text" name="name" placeholder="Your Name">

                <label for="email">Email</label>
                <input class="input" type="text" name="email" placeholder="example@domain.com">

                <label for="content">Message</label>
                <textarea name="content" placeholder="Your message here"></textarea>
                <input type="submit" name="submit" value="Send"/>
            </form>
        </div>
    </div>
</div>

<?php
include("templates/footer.php");
?>