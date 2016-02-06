<?php
/**
 * Created by PhpSphonerm.
 * User: Radley
 * Date: 12/12/2015
 * Time: 2:30 PM
 */


$carrier = $_POST['carrier'];
$phone = $_POST['phone'];
$msg = $_POST['message'];

$subject = 'Hi';
$mailfrom = 'From Xandra';

if ($carrier == "1") {
    $email = "$phone@vtext.com";
} elseif ($carrier == "2") {
    $email = "$phone@message.alltel.com";
} elseif ($carrier == "3") {
    $email = "$phone@myboostmobile.com";
} elseif ($carrier == "4") {
    $email = "$phone@cingularme.com";
} elseif ($carrier == "5") {
    $email = "$phone@messaging.nextel.com";
} elseif ($carrier == "6") {
    $email = "$phone@messaging.sprintpcs.com";
} elseif ($carrier == "7") {
    $email = "$phone@tmomail.net";
} elseif ($carrier == "8") {
    $email = "$phone@vmobl.com";
} elseif ($carrier == "9") {
    $email = "$phone@txt.att.net";
}

if (mail($email, $subject, $msg, $mailfrom)) {
    echo "<h4>Your Text Was Successfully Sent.</h4>";
    echo "<br />";

    if ($backurl == "") {
        echo "<a href='javascript:history.back(1);'>Back</a>";
    } else {
        echo "<a href='" . $backurl . "'>Back</a>";
    }
    echo "</body></html>";
} else {
    echo "<h4><b>Error Sending Message</b></h4><br>Can't send txt to $phone. <br> Contact the site Administrator.";
}