<?php
namespace Gameratings\app;
use Gameratings\Config\Database;
use Gameratings\pdo;
use Gameratings\App\Controllers\GameController;


// Cria a conexão com o banco
$pdo = Database::connect();

// Instancia o controlador
$controller = new GameController($pdo);

// Roteamento básico
$route = $_GET['route'] ?? 'game';

if ($route === 'game') {
    $controller->index();
} elseif ($route === 'game/edit' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $controller->edit($id);
} else {
    echo "Rota não encontrada!";
}
