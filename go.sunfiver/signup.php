<?php
if (isset($_POST['email'])) {
    $mail = $_POST['email'];
    $name = $_POST['name'];
    mail('alesgaroth@alesgaroth.com', 'New signup', "Name: $name\nEmail: $mail");
    mail($mail, 'Welcome to Sunfiver', "Hello $name,\n\nThank you for signing up for Sunfiver! We are excited to have you on board.\n\nBest regards,\nAlan Linton of The Sunfiver Team");
    redirect('https://sunfiver.com/thank-you');
} else {
    // Redirect to the signup page if accessed directly
    redirect('https://sunfiver.com/');
}
?>