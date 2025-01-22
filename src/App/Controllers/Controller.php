<?php
namespace Ratinggames\App\Controllers;

use Gameratings\App\Models\Entity\Game;
use Gameratings\App\Repository\GameRepository;
use Gameratings\Config\Database;
use PDO;

interface Controller
{

    public function processaRequisicao();

}

// Inicialização da conexão com o banco de dados e do controlador

