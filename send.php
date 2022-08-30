<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="stylesheets/normalize.css" type="text/css" rel="stylesheet">
    <link href="stylesheets/styles.css" type="text/css" rel="stylesheet">
</head>

<?php
//Check if user has come from form and submitted data, else kick back to form
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']) && empty($_POST['url'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Sanitise - Capitalise name, convert special chars to HTML entities, and remove illegal characters from email
    $cleanedName = htmlspecialchars(ucwords(trim($name)));
    $cleanedEmail = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    $cleanedMessage = htmlspecialchars(trim($message));


    //Validate - Check inputs are not empty and email is valid (using built-in functions)
    //If all fields are valid, show the message, else show errors

    echo "<section class='message'>";

    if (!empty($cleanedName)
        && filter_var($cleanedEmail, FILTER_VALIDATE_EMAIL)
        && !empty($cleanedMessage)) {

        //Mail Info
//        $to = "yourEmail@email.com";
//        $subject = "Message from contact form";
//        $htmlMsg = "<p style='overflow-wrap: break-word; hyphens: auto;'>"
//            . "<strong>Name: </strong>$cleanedName<br>"
//            . "<strong>Email: </strong>$cleanedEmail<br>"
//            . "<strong>Message: </strong><span style='display: block; margin: 5px 0;'>$cleanedMessage</span>"
//            . "</p>";
//        $headers[] = 'MIME-Version: 1.0';
//        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
//        $headers[] = 'From: WebForm <webform@example.com>';
//        $headers[] = 'Reply-To: ' . $cleanedEmail;
//        $headers[] = 'X-Mailer: PHP/' . phpversion();
//
//        $success = mail($to, $subject, $message, implode("\r\n", $headers));
//        if (!$success) {
//            $errorMessage = error_get_last()['message'];
//            console.log($errorMessage);
//        }

        echo "<h1>Success!</h1>";
        echo "<p>Your message:</p>";
        echo "<p>"
            . "<strong>Name: </strong>$cleanedName<br>"
            . "<strong>Email: </strong>$cleanedEmail<br>"
            . "<strong>Message: </strong><span>$cleanedMessage</span>"
            . "</p>";
        echo "<br><a href='index.html'>Back to form</a>";
    } else {
        echo "<p>Uh oh, looks like something's wrong with your data</p>";
        echo "<ul>";

        if (!empty($cleanedName)) {
            echo "<li>You did not enter a valid name</li>";
        }

        if (!filter_var($cleanedEmail, FILTER_VALIDATE_EMAIL)) {
            echo "<li>You did not enter a valid email</li>";
        }

        if (empty($cleanedMessage)) {
            echo "<li>You did not enter a message</li>";
        }
        echo "</ul><br><a href='index.html'>Back to form</a>";
    }

    echo "</section>";

} else {
    header('Location: index.html');
}
