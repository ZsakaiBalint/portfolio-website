<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);



$dataSourceName = "mysql:host=$host;dbname=$databaseName";

$db = new PDO($dataSourceName,$username,$password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query to get the user
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // User is authenticated, set session variables
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect to admin dashboard or homepage
        header('Location: /admin-dashboard');
        exit();
    } else {
        // Invalid login
        header('Location: /login?status=failure');
    }
}
?>
