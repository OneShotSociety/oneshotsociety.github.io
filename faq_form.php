<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaSecret = '6LdiWAcrAAAAAEFkLV6EdiV7chGtO-PByO0mDhDc'; // Replace with your actual secret key
    $recaptchaResponse = $_POST['recaptchaResponse'];

    // Verify the reCAPTCHA response
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        // Verification failed
        echo 'reCAPTCHA verification failed. Please try again.';
    } else {
        // Verification succeeded - process your form
        echo 'Thank you! Your message has been sent.';
        // Further processing logic
        // For example, sanitize input and save to database or send an email
    }
}
?>
