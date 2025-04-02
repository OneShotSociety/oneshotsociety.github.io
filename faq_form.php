<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaSecret = '6LdiWAcrAAAAAEFkLV6EdiV7chGtO-PByO0mDhDc';  // Replace with your actual secret key
    $recaptchaResponse = $_POST['g-recaptcha-response']; // Get the reCAPTCHA response

    // Verify the reCAPTCHA response
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        // Verification failed
        echo 'Please complete the reCAPTCHA';
    } else {
        // Verification succeeded - process your form
        echo 'Success! Form submitted.';
        // Here you can process the form (e.g., save to a database, send an email, etc.)
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Add your form processing logic here
        // For example, save to a database or send an email
    }
}
?>
