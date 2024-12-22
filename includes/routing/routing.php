<?php 

function run(string $url, array $routes): void
{
    //allow trailing slash at the end of the uri 
    $uri = parse_url($url);
    $path = rtrim($uri['path'], '/');
    $path = $path === '' ? '/' : $path;

    // Handle maintenance mode (exclude the /maintenance route itself)
    if (defined('APP_MAINTENANCE') && APP_MAINTENANCE === true && $path !== '/maintenance') {
        http_response_code(503); // 503 Service Unavailable
        header("Location: /maintenance");
        die();
    }

    // Handle unauthorized access
    if (!defined('APP_ACCESS')) {
        http_response_code(403); // 403 Forbidden
        header("Location: /error");
        die();
    }

    $params = [];
    foreach ($routes as $route => $callback) {
        $routeRegex = preg_replace('/{(\w+)}/', '(?P<$1>[^/]+)', $route);
        $routeRegex = "@^" . $routeRegex . "$@";

        if (preg_match($routeRegex, $path, $matches)) {
            $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

            if (!empty($uri['query'])) {
                parse_str($uri['query'], $queryParams);
                $params = array_merge($params, $queryParams);
            }

            $callback($params);
            return;
        }
    }

    // If no route matched, include the 404 page
    include_once "views/404.php";
}

?>
