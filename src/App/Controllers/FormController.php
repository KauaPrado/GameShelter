<?php
namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Game;
use Ratinggames\App\Repository\GameRepository;
use Ratinggames\Config\Database;
use PDO;

class FormController implements Controller{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
 

    public function processaRequisicao() {
        $gamerepository = new GameRepository($this->pdo);
        $games = $gamerepository->getAll();
        require __DIR__ . '/../views/game-form.php';
    }
}

// Inicialização da conexão com o banco de dados e do controlador

