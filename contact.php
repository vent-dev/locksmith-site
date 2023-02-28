<?php

if ($_POST) {
    $user_email = "";
    $user_subject = "";
    $user_message = "";
    $email_body = "<div>"; 

    if (isset($_POST['user_email'])) {
        $user_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['user_email']);
        $user_email = filter_var($user_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div><label>Sender Email:</label>&nbsp;<span>".$user_email."</span></div>";
    }

    if (isset($_POST['user_subject'])) {
        $user_subject = filter_var($_POST['user_subject'], FILTER_SANITIZE_STRING);
        $email_body .= "<div><label>Subject:<label>&nbsp;<span>".$user_subject."</span></div>";
    }

    if (isset($_POST['user_message'])) {
        $user_message = htmlspecialchars($_POST['user_message']);
        $email_body .= "<div><label>Message:<label>&nbsp;<span>".$user_message."</span></div>";
    }

    $recipient = "";

    $email_body .= "</div>";

    $headers = "MIME-Version: 1.0" . "\r\n"
    ."Content-type: text/html; charset=utf-8" . "\r\n"
    ."From " . $user_email . "\r\n";

    if (mail($recipient, $user_subject, $email_body, $headers)){
        echo "<p>Thankyou for contacting us! You should recieve a response within 24 hours.<p>";
    } else {
        echo "<p>Something went wrong. Please try again or give us a call!<p>";
    }
}
?>
