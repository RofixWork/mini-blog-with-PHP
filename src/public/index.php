<?php

use App\App;
use App\Controllers\CategoryController;
use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\ProfileController;
use App\Router;

require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

//paths
const VIEW_PATH = __DIR__ . '/../views';
const STORAGE_PATH = __DIR__ . '/../storage';


$container = new \Illuminate\Container\Container();
$router = new Router($container);

$router->get('/', [HomeController::class, 'index'])
    ->get('/posts', [PostController::class, 'index'])
->get('/categories', [CategoryController::class, 'index'])
->post('/categories/create', [CategoryController::class, 'create'])
->get('/categories/edit', [CategoryController::class, 'edit'])
->post('/categories/update', [CategoryController::class, 'update'])
->get('/categories/delete', [CategoryController::class, 'delete'])
->post('/post/store', [PostController::class, 'store'])
->get('/posts/delete', [PostController::class, 'delete'])
->get('/profile', [ProfileController::class, 'index']);


(new App($container, $router, [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD']
]))->boot()->run();

