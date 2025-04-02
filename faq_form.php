<?php
// Turn on error reporting for debugging during development (comment out in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaSecret = '6LdiWAcrAAAAAEFkLV6EdiV7chGtO-PByO0mDhDc'; // Replace with your actual Secret Key
    $recaptchaResponse = $_POST['recaptchaResponse']; // Get the token from the form data

    // Verify the reCAPTCHA response
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
    $responseKeys = json_decode($response, true);

    // Check the success status of the verification
    if (intval($responseKeys["success"]) !== 1) {
        echo 'reCAPTCHA verification failed. Please try again.';
    } else {
        // Verification succeeded
        echo 'Thank you! Your message has been sent.';
        // Here, you can process the form data further (e.g., save to a database, send an email, etc.)
        // Example: echo htmlspecialchars($_POST['name']);
    }
} else {
    // If the request method isn't POST, you can redirect or show an error
    echo 'Invalid request method.';
}
?>
