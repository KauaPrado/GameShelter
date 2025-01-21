<?php
namespace Ratinggames\app;
use Ratinggames\Config\Database;
use Ratinggames\pdo;
use Ratinggames\App\Controllers\GameController;


// Cria a conexão com o banco
$pdo = Database::connect();

// Instancia o controlador
$controller = new GameController($pdo);

// Roteamento básico
$controller->index();
