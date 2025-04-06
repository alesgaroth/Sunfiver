<?php
if (isset($_POST['email'])) {
    $mail = $_POST['email'];
    $name = $_POST['name'];
    mail('alesgaroth@alesgaroth.com', 'sunfiver survey 1', $_POST);
    header('Location: https://sunfiver.com/thank-you');
    ?>Thank you! We'll be in touch<?php
} else {
    // Redirect to the signup page if accessed directly
    header('Location: https://sunfiver.com/');
    ?>Hello?
    <?php
}
?>
