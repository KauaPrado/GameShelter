<?php


namespace Ratinggames\app;
require_once __DIR__ . '/../vendor/autoload.php';
use Ratinggames\Config\Database;
use Ratinggames\pdo;
use Ratinggames\App\Controllers\GameController;
use Ratinggames\App\Controllers\Error404Controller;
use Ratinggames\app\Repository\GameRepository;

// Cria a conexão com o banco
$pdo = Database::connect();
$gamerepository = new GameRepository($pdo);

// Instancia o controlador
$controller = new GameController($pdo);

$routes = require_once __DIR__ . '/../Conf/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)){
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($pdo);
} else {
    $controller = new Error404Controller();
}



$controller->processaRequisicao();