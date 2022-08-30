<?php
//Check if user has come from form and submitted data, else kick back to form
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Sanitise - Capitalise name, convert special chars to HTML entities, and remove illegal characters from email
    $cleanedName = htmlspecialchars(ucwords(trim($name)));
    $cleanedEmail = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    $cleanedMessage = htmlspecialchars(trim($message));

    //Validate - Check inputs are not empty and email is valid
    //If all fields are valid, show the message, else show errors
    if (!empty($cleanedName)
        && filter_var($cleanedEmail, FILTER_VALIDATE_EMAIL)
        && !empty($cleanedMessage)) {
        echo nl2br("Success!\nYour message:\n");
        echo nl2br("Name: $cleanedMessage\nEmail: $cleanedEmail\nMessage: $cleanedMessage");
        echo "<br><a href='index.html'>Back to form</a>";
    } else {
        echo "Uh oh, looks like something's wrong with your data";
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

} else {
    header('Location: index.html');
}
