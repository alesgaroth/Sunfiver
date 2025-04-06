<?php
if (isset($_POST['email'])) {
    $mail = $_POST['email'];
    $name = $_POST['name'];
    $message = "";
    foreach($_POST as $key => $value){
        $message .= "{$key} : {$value}\n";
    }
    $headers = 'From: form@sunfiver.com' . "\r\n" .
    'Reply-To: alesgaroth@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail('alesgaroth@alesgaroth.com', 'sunfiver survey 1', $message, $headers);
    header('Location: https://sunfiver.com/thank-you');
    ?>Thank you! We'll be in touch<?php
} else {
    // Redirect to the signup page if accessed directly
    header('Location: https://sunfiver.com/');
    ?>Hello?
    <?php
}
?>
