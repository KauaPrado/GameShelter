<?php

namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Game;
use Ratinggames\App\Repository\GameRepository;
use Ratinggames\Config\Database;
use PDO;
use finfo;
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
        
        if($image["name"] != NULL){
            $safeFileName = pathinfo($_FILES['image']['name'], PATHINFO_BASENAME);
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->file($_FILES['image']['tmp_name']);

            if(str_starts_with($mimeType, 'image/')){
                
                $nomeImagem = $image['name'];
                $tmp_name = $image['tmp_name'];
                $extension = pathinfo($nomeImagem, PATHINFO_EXTENSION);
                $newImageName = uniqid().'.'.$extension;
                $uploadDir = __DIR__ . '/../../../public/images/';
                move_uploaded_file($tmp_name, $uploadDir.$newImageName);
            }
            else
            {
                $newImageName ='';
            }
        }
        else{
            $newImageName ='';
        }

        



        $add = $this->gamerepository->add($title, $description, $newImageName);

        if ($add) {
            header("Location: /");
            exit;
        } else {
            echo "Erro ao atualizar o jogo!";
        }
    }
}
