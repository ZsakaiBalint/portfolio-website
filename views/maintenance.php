<?php
if (!defined('APP_MAINTENANCE') || APP_MAINTENANCE !== true) {
    http_response_code(404);
    include_once "views/404.php";
    exit;
}
?>

<?php 
require "partials/head.php";
?>

<!DOCTYPE html>
<html lang="en">
    <body>
        <div class="text-center">
            <h1>Az oldal karbantartás alatt áll</h1>
            <h2>A karbantartás időtartama: </h2>
            <h2>2024.12.18 22:00 - 2024.12.19 00:00</h2>
            <img src="../images/construction.gif" alt="under maintenance gif with a penguin">
        </div>
    </body>
</html>

