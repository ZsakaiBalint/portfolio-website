<?php

return [

    '/' => function () {
        include 'views/home.php';
    },

    '/about' => function () {
        include 'views/about.php';
    },

    '/form' => function () {
        header('Location: /#form-section');
        exit();
    },
    
    '/error' => function () {
        include 'views/404.php';
    },

    '/projects' => function () {
        header('Location: /#projects-section');
        exit();
    },

    '/tic_tac_toe' => function () {
        include 'views/tic_tac_toe.php';
    },



];