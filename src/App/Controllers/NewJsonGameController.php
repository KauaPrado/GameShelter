<?php

namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Game;
use Ratinggames\App\Repository\GameRepository;
use Ratinggames\Config\Database;
use PDO;

class NewJsonGameController implements Controller
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
        $request = file_get_contents('php://input');
        $gameData= json_decode($request, true);
        var_dump($gameData);
        $this->gamerepository->add($gameData['title'], $gameData['description'], '');

        http_response_code(201);
    }

   
}
 