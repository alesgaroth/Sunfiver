<?php

function verifyCaptcha($recaptchaResponse) {
    $secretKey = file_get_contents( $_SERVER['NFSN_SITE_ROOT']."/protected/captcha_secretkey");
    
    // Make POST request to the Google reCAPTCHA verification API
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => $secretKey,
        'response' => $recaptchaResponse,
        'remoteip' => $_SERVER['REMOTE_ADDR'] // Optional: the user's IP address
    ];
    
    // Use cURL to send the verification request
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    
    // Parse and return the JSON response
    $responseData = json_decode($response, true);
    return $responseData['success'];
}

if (isset($_POST['email'])) {
    $mail = $_POST['email'];
    $name = $_POST['name'];
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
    if (verifyCaptcha($recaptchaResponse)) {
      mail('alesgaroth@alesgaroth.com', 'New sunfiver signup', "Name: $name\nEmail: $mail\nRecaptcha: $recaptchaResponse");
      mail($mail, 'Welcome to Sunfiver', "Hello $name,\n\nThank you for signing up for Sunfiver! We are excited to have you on board.\n\nBest regards,\nAlan Linton of The Sunfiver Team");
      header('Location: https://www.sunfiver.com/thank-you');
    } else {
      // captcha failed.  go away
      header('Location: https://www.sunfiver.com/');
    }
    ?>Thank you! We'll be in touch<?php
} else {
    // Redirect to the signup page if accessed directly
    header('Location: https://www.sunfiver.com/');
    ?>Hello?
    <?php
}
?>
