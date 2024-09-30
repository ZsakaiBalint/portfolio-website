<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require __DIR__ . '/views/home.php';
        break;

    case '/about':
        require __DIR__ . '/views/about.php';
        break;
    
    case '/projects':
        require __DIR__ . '/views/home.php';
        echo '<script>window.location.hash = "projects-section";</script>'; 
        break; 

    default:
        http_response_code(404); 
        require __DIR__ . '/views/404.php';
        break;
}

?>