<?php
// Secret key you received from Google
$secret_key = "6Ld2ywIrAAAAAMxV0Hqi7w-RYSozhjoIKJ0wDaQH";

// Get the reCAPTCHA response from the form
$recaptcha_response = $_POST['g-recaptcha-response'];

// Send a request to Google to verify the reCAPTCHA response
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_response");

// Decode the JSON response from Google
$response_keys = json_decode($response, true);

// Check if the reCAPTCHA was successfully verified
if (isset($response_keys['success']) && $response_keys['success'] === true) {
    echo "reCAPTCHA verification successful!";
} else {
    echo "reCAPTCHA verification failed. Please try again.";
}
?>
