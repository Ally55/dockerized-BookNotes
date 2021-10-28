<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

require '../app/auth.php';
require '../app/validator.php';

use BookNotes\Core\Router;
use BookNotes\Core\Container;

if (file_exists(dirname(__DIR__) . '/.env')) {
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(dirname(__DIR__));
    $dotenv->load();
}

Container::bind('config', require '../config/config.php');
Container::bind('connection', new \BookNotes\Core\Database\Connection(Container::get('config')));
Container::bind('query', new \BookNotes\Core\Database\QueryBuilder(Container::get('connection')->pdo));


$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$router = Router::load('../app/routes.php');


$requestMethod = $_SERVER['REQUEST_METHOD'];
$router->direct($uri, $requestMethod);


//$urlMap = [
//    '/' => 'index.html',
//    '/signup' => 'signup.php',
//    '/login' => 'login.php',
//    '/logout' => 'logout.php',
//    '/library' => 'library.php',
//    '/create_notes' => 'create_notes.php',
//    '/user_notes' => 'user_notes.php',
//    '/note' => 'note.php'
//];
//
//$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
//
//include(__DIR__ . '/../app/views/base.php');







