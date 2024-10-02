<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'utility/routing.php';

$routes = include_once 'utility/routes.php';

run($_SERVER['REQUEST_URI'], $routes);