<?php

namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Game;
use Ratinggames\App\Repository\GameRepository;
use Ratinggames\Config\Database;
use PDO;

class EditGameController implements Controller
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
            $this->updateGame();
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

    private function updateGame()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        // if (!empty($_FILES['image']['name'])) {
        //     $imagePath = '../../public/images/' . basename($_FILES['image']['name']);
        //     move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        // } else {
        //     $imagePath = $_POST['current_image'];
        // }
        

        if ($image["name"] != NULL)
        {

            $nomeImagem = $image['name'];
            $tmp_name = $image['tmp_name'];
            $extension = pathinfo($nomeImagem, PATHINFO_EXTENSION);
            $newImageName = uniqid().'.'.$extension;


            $uploadDir = __DIR__ . '/../../../public/images/';
            move_uploaded_file($tmp_name, $uploadDir.$newImageName);
            $updated = $this->gamerepository->update($id, $title, $description, $newImageName);

            if ($updated) {
                header("Location: /");
                exit;
            } else {
                echo "Erro ao atualizar o jogo!";
            }

        }

        else{
            $updatedWithoutImage = $this->gamerepository->updateWithoutImage($id, $title, $description);
            if ($updatedWithoutImage) {
                header("Location: /");
                exit;
            } else {
                echo "Erro ao atualizar o jogo!";
            }

        }
            

        }
        
        
    }

