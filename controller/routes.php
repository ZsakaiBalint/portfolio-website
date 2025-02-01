<?php

return [
    "/" => [HomeController::class, "index"],
    "/login" => [AuthController::class, "login"],
    "/registration" => [AuthController::class, "registration"],
    "/about" => [HomeController::class, "about"],
    "/blog" => [HomeController::class, "blog"],
    "/error" => [HomeController::class, "error"],
    "/maintenance" => [HomeController::class, "maintenance"],
    "/admin-dashboard" => [AdminController::class, "dashboard"]
];

?>