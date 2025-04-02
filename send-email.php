<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form fields
    $name = htmlspecialchars(trim($_POST['name']));
    // Additional fields can be collected here
    
    // Set the recipient email address
    $to = 'admin@oneshotsociety.uk'; // Change this to your email address
    $subject = 'New Form Submission';
    
    // Build the email content
    $message = "Name: $name\n";
    // Add other fields to the message
    
    $headers = "From: faq@oneshotsociety.uk"; // Change this to a valid "From" email

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.";
    }
} else {
    echo "Invalid request method.";
}
?>
