<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $secretKey = "6Le1YDYrAAAAAPLxPs63owkS0cYU9k3kQenceJ63";
    // $captcha = $_POST['g-recaptcha-response'];

    // if (!$captcha) {
    //     echo "Please complete the CAPTCHA.";
    //     exit;
    // }

    // Verify CAPTCHA
    // $verifyResponse = file_get_contents(
    //     "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha"
    // );
    // $responseData = json_decode($verifyResponse);

    // if (!$responseData->success) {
    //     echo "CAPTCHA verification failed. Please try again.";
    //     exit;
    // }

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phoneno = $_POST['phoneno'];
    $message = nl2br(htmlspecialchars($_POST['message']));

    $to = "support@intellaxy.com";
    $subject = "New Contact Message";
    $body = "Name: $name\nEmail: $email\n\nPhone Number: $phoneno\n\nMessage:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
}
?>
