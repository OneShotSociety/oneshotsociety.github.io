<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        echo 'Invalid input';
        exit;
    }

    // Send email (ensure you configure your mail server)
    $to = "admin@oneshotsociety.uk"; // Change to your email address
    $subject = "General Query";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        // Optionally handle success response
        echo "success";
    } else {
        // Optionally handle error response
        echo "error";
    }
}
?>
