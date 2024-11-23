<?php
session_start();

//redirect on direct access
if($_SERVER['REQUEST_METHOD'] !== "POST") {
    http_response_code(404);
    header("Location: /error");
    die();
}

$errors = [];
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$message = trim(htmlspecialchars($_POST["message"]));

if(empty($name)) {
    $errors['name'] = "A név mező nem lehet üres!";
}
if(empty($email)) {
    $errors["email"] = "Az emailcím nem lehet üres!";
}
if(empty($message)) {
    $errors["message"] = "Az üzenet nem lehet üres!";
}

// Redirect back to the form if there are errors
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("Location: /#form-section");
    exit;
}

//send email
$msg = "First line of text\nSecond line of text";
$msg = wordwrap($msg,70);
$to = "balint@balintfejleszto.hu";
$subject = "Teszt levél";

if (mail($to, $subject, $msg)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}

//header("Location: /#form-section");
phpinfo();
?>