<?php
namespace Ratinggames\App\Controllers;

use Gameratings\App\Models\Entity\Game;
use Gameratings\App\Repository\GameRepository;
use Gameratings\Config\Database;
use PDO;

class GameController {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $gamerepository = new GameRepository($this->pdo);
        $games = $gamerepository->getAll();
        require __DIR__ . '/../views/game-list.php';
    }

    public function edit($id) {
        $gameRepository = new GameRepository($this->pdo);
        $game = $gameRepository->getById($id);
    
        if ($game) {
            require __DIR__ . '/../views/formEdit.php';
        } else {
            echo "Jogo não encontrado!";
        }
    }
    
    
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_POST['image'];
    
            $gameRepository = new GameRepository($this->pdo);
            $gameRepository->update($id, $title, $description, $image);
    
            // Redireciona para a lista de jogos
            header("Location: /game");
            exit;
        } else {
            echo "Método inválido!";
            exit;
        }
    }
    

}

// Inicialização da conexão com o banco de dados e do controlador

