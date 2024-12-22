<?php
session_start();

//redirect on direct access
if($_SERVER['REQUEST_METHOD'] !== "POST") {
    http_response_code(404);
    header("Location: /error");
    die();
}

// Get data from the form
$errors = [];
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$message = trim(htmlspecialchars($_POST["message"]));

// Accumulate errors
if(empty($name)) {
    $errors['name'] = "A név mező nem lehet üres!";
}
if(empty($email)) {
    $errors["email"] = "Az emailcím nem lehet üres!";
}
if(empty($message)) {
    $errors["message"] = "Az üzenet nem lehet üres!";
}

// Redirect back to the form if there were any errors
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("Location: /#form");
    exit;
}

// Send email
$to = "balint@balintfejleszto.hu";
$subject = $email . " - " . $name;

if (mail($to, $subject, $message)) {
    header("Location: /?status=success#form");
} else {
    header("Location: /?status=failure#form");
}

?>