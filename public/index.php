<?php
session_start();
require   __DIR__ . '/../vendor/autoload.php';

use FastRoute\RouteCollector ;
use  App\Controllers;

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector  $r) {
    $r->addRoute('GET', '/login', 'get_login_page');
    $r->addRoute('GET', '/register', 'get_register_page');
    $r->addRoute('GET', '/', 'get_default_page');
    $r->addRoute('GET', '/blog/{id:\d+}', 'get_blog');
    $r->addRoute('GET', '/blogscollection', 'get_blogscollection');

    $r->addRoute('POST', '/loginRequest', 'post_login_page');
    $r->addRoute('POST', '/registerRequest', 'post_register_page');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
 case FastRoute\Dispatcher::NOT_FOUND:
  echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo "405 Not Allowed";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1]; 
        $vars = $routeInfo[2];
        if ($handler == 'get_login_page') {
            $obj = new Controllers\AuthController; 
            $obj -> get_login_page(); 
        }
        else if ($handler == 'get_register_page') {
            $obj = new Controllers\AuthController; 
            $obj -> get_register_page(); 
        }
        else if ($handler == 'get_blog') {
            $obj = new Controllers\BlogController; 
            $obj -> get_blog($vars ["id"]); 
        }
        else if ($handler == 'get_blogscollection') {
            $obj = new Controllers\BlogController; 
            $obj -> get_blogscollection(); 
        }
        else if ($handler == 'get_default_page') {
            $obj = new Controllers\BlogController; 
            $obj -> get_default_page(); 
        }
        else if ($handler == 'post_login_page') {
            $obj = new Controllers\AuthController; 
            $obj -> post_login_page(); 
        }
        else if ($handler == 'post_register_page') {
            $obj = new Controllers\AuthController; 
            $obj -> post_register_page(); 
        }

        break;
}