<?php

namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Game;
use Ratinggames\App\Repository\GameRepository;
use Ratinggames\Config\Database;
use PDO;

class NewGameController implements Controller
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
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->showEditForm();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->NewGame();
        }
    }

    private function showEditForm()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $game = $this->gamerepository->getById($id);

            if (!$game) {
                header("Location: game-list.php");
                exit;
            }

            include 'views/edit-game.php';
        } else {
            header("Location: game-list.php");
            exit;
        }
    }

    private function NewGame()
    {
        
        $title = $_POST['title'];
        $description = $_POST['description'];



        $image = $_FILES['image'];
        $nomeImagem = $image['name'];
        $tmp_name = $image['tmp_name'];
        $extension = pathinfo($nomeImagem, PATHINFO_EXTENSION);
        $newName = uniqid().'.'.$extension;


        $uploadDir = __DIR__ . '/../../../public/images/';
        move_uploaded_file($tmp_name, $uploadDir.$newName);



        $add = $this->gamerepository->add($title, $description, $newName);

        if ($add) {
            header("Location: /");
            exit;
        } else {
            echo "Erro ao atualizar o jogo!";
        }
    }
}
