<?php

return [
    "/" => function () {
        include_once "views/home.php";
    },
    "/login" => function ($params) {
        include_once "views/login.php";
    },
    "/registration" => function ($params) {
        include_once "views/registration.php";
    },
    "/about" => function () {
        include_once "views/about.php";
    },
    "/blog" => function () {
        include_once "views/blog.php";
    },
    "/error"=> function () {
        include_once "views/404.php";
    },
    "/maintenance" => function () {
        include_once "views/maintenance.php";
    },
    "/admin-dashboard" => function () {
        include_once "views/admin-dashboard.php";
    }
];

?>