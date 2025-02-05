<?php

namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Game;
use Ratinggames\App\Repository\GameRepository;
use Ratinggames\Config\Database;
use PDO;

class JsonGameController implements Controller
{
    private PDO $pdo;
    private GameRepository $gamerepository;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->gamerepository = new GameRepository($this->pdo);
    }

    public function processaRequisicao()
    {
        $gameList = $this->gamerepository->getAll();
        echo json_encode(($gameList));
    }

   
}
 