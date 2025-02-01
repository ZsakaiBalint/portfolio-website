<?php

define("APP_ACCESS", true);

define("APP_MAINTENANCE", false);

include_once "controller/router.php";

$routes = include_once "controller/routes.php";

run($_SERVER["REQUEST_URI"], $routes);

?>