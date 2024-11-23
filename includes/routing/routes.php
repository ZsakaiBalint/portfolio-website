<?php

return [
    "/" => function () {
        include_once "views/home.php";
    },
    "/login" => function ($params) {
        include_once "views/login.php";
    },
    "/about" => function () {
        $name = 'Guest';
        include_once "views/about.php";
    },
    "/about/{name}" => function ($params) {
        $name = htmlspecialchars($params['name']);
        include_once "views/about.php";
    },
    "error"=> function () {
        include_once "views/404.php";
    }
];

?>