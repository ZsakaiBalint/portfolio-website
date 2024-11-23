<?php
if(!defined('APP_ACCESS')) { 
    http_response_code(404);
    header("Location: /error");
    die();
}
?>

<h1>Login Page</h1>
<form method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <button type="submit">Login</button>
</form>
