<?php

define("APP_ACCESS", true);

include_once "includes/routing/routing.php";

$routes = include_once "includes/routing/routes.php";

run($_SERVER["REQUEST_URI"], $routes);

?>