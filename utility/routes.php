<?php

return [

    '/' => function () {
        include 'views/home.php';
    },

    '/about' => function () {
        include 'views/about.php';
    },

    '/project' => function () {
        include 'views/project.php';
    },

    '/projects' => function () {
        header('Location: /#projects-section');
        exit();
    },

    '/form' => function () {
        header('Location: /#form-section');
        exit();
    },

    '/error' => function () {
        include 'views/404.php';
    } 
];