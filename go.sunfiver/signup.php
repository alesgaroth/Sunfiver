<?php
if (isset($_POST['email'])) {
    $mail = $_POST['email'];
    $name = $_POST['name'];
    mail('alesgaroth@alesgaroth.com', 'New signup', "Name: $name\nEmail: $mail");
    mail($mail, 'Welcome to Sunfiver', "Hello $name,\n\nThank you for signing up for Sunfiver! We are excited to have you on board.\n\nBest regards,\nThe Sunfiver Team");
    redirect('https://sunfiver.com/thank-you');
}
?>