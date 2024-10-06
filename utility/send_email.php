<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['mail-sending-error'] = [];
    $_SESSION['form_data'] = $_POST;

    // Validate Name
    if (!isset($_POST["name"]) || trim($_POST["name"]) === '') {
        $_SESSION['mail-sending-error'][] = "NAME";
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    // Validate Email
    if (!isset($_POST["email"]) || trim($_POST["email"]) === '' || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mail-sending-error'][] = "EMAIL";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    // Validate Message
    if (!isset($_POST["message"]) || trim($_POST["message"]) === '') {
        $_SESSION['mail-sending-error'][] = "MESSAGE";
    } else {
        $message = htmlspecialchars($_POST["message"]);
    }

    // Redirect back to form if there are errors
    if (!empty($_SESSION['mail-sending-error'])) {
        header("Location: /form");
        exit();
    }

    // Email subject and recipient
    $to = "mail@balintdeveloper.com";
    $subject = "New message from a website visitor!";

    // Create the email content
    $body = "You have received a new message from your website form.\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message: $message\n";

    // Additional headers (reply-to, etc.)
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
        unset($_SESSION['form_data']); // Clear the form data after successful submission
    } else {
        echo "Message sending failed.";
    }
}
?>
