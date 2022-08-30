<?php
//Check if user has come from form and submitted data, else kick back to form
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Sanitise

    //Validate

    //If all fields are valid, do the thing, else display error

} else {
    header('Location: index.html');
}
