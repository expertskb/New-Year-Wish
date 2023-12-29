<?php
/*
Author : Shakib Ahmed
E-mail : shakibwap@yahoo.com
WEB: https://shakib.eu.org
*/
define('SHAKIB', true);
include_once('./config/init.php');

use Shakib\Controller\HomeController;
use Shakib\Controller\WishController;
use Shakib\Controller\NotFoundController;

$req_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/NotFoundController';

$route = array();

// Define public folder
$public_folder = 'cdn';

// Check if it's a request for a public file
if (strpos($req_uri, '/' . $public_folder . '/') === 0 && file_exists(__DIR__ . $req_uri)) {
    // Serve the file directly from the public folder
    return false;
}

$route['/'] = HomeController::class;
$route['/wish'] = WishController::class;

// Parse the request URI and extract parameters
$uri_parts = explode('/', $req_uri);
$route_key = '/' . $uri_parts[1];


// Find the controller for the requested route
$controller_find = $route[$route_key] ?? NotFoundController::class;


if (count($uri_parts) > 2) {
    $id = $uri_parts[2] ?? null;
    if ($id != null && (!empty($id))) {
        $controller = new $controller_find($id);
    } else {
        $controller = new NotFoundController();
    }
} else {
    $controller = new $controller_find();
}

$controller->index();
