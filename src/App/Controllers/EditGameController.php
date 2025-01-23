<?php
namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Game;
use Ratinggames\App\Repository\GameRepository;
use Ratinggames\Config\Database;
use PDO;

class GameController implements Controller
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function processaRequisicao() {
        
       
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Instancia o repositório para buscar o jogo pelo ID
    $gamerepository = new GameRepository($this->pdo);
    $game = $gamerepository->getById($id);

    // Se o jogo não for encontrado, redireciona para a lista de jogos
    if (!$game) {
        header("Location: game-list.php");
        exit;
    }
} else {
    header("Location: game-list.php");
    exit;
}

// Atualiza os dados no banco de dados ao enviar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Verifica se foi enviada uma nova imagem
    if (!empty($_FILES['image']['name'])) {
        $imagePath = '../../public/images/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        $imagePath = $game['image']; // Mantém a imagem atual
    }

    // Atualiza o jogo no banco de dados
    $updated = $gamerepository->update($id, $title, $description, $imagePath);

    if ($updated) {
        header("Location: game-list.php");
        exit;
    } else {
        echo "Erro ao atualizar o jogo!";
    }
}
    }

}

// Inicialização da conexão com o banco de dados e do controlador

