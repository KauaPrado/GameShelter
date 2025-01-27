<?php
namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Game;
use Ratinggames\App\Repository\GameRepository;
use Ratinggames\Config\Database;
use PDO;

class SearchGameController implements Controller
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function processaRequisicao() {
        $search = $_GET['search'];
        $gamerepository = new GameRepository($this->pdo);
        $games = $gamerepository->searchByTitle($search);
        require __DIR__ . '/../views/game-list.php';
    }

}

