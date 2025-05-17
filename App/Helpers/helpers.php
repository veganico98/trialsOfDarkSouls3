<?php
function isCurrentRoute($route) {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return $path === $route;
}

function getCurrentRouteName()
{
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $segments = explode('/', trim($path, '/'));
    
    return isset($segments[0]) && $segments[0] !== '' ? ucfirst($segments[0]) : 'Home';
}
?>