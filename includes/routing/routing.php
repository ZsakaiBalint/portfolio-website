<?php 

function run(string $url, array $routes): void
{
    //allow '/' at the end of the uri 
    $uri = parse_url($url);
    $path = rtrim($uri['path'], '/');
    $path = $path === '' ? '/' : $path;

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
