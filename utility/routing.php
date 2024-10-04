<?php

function run(string $url, array $routes): void 
{
    // Parse the URL and get the path
    $uri = parse_url($url);
    $path = $uri['path'];

    // Block access to all php files
    if (strpos($path, '.php') !== false) {
        $path = '/error'; // Redirect to error route
    }

    // If the path is empty or '/', map it to '/'
    if ($path === '' || $path === '/' || $path === '/index.php') {
        $path = '/';
    }

    // Check if the route exists, otherwise, set the path to '/error'
    if (!array_key_exists($path, $routes)) {
        $path = '/error';
    }

    // Call the corresponding route callback
    $callback = $routes[$path];
    $callback();
}
