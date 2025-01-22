<?php
Use Ratinggames\config\Database;
use Ratinggames\App\Models\Entity\Game;
use Ratinggames\app\Repository\GameRepository;

$pdo = Database::connect();

// Verifica se o ID foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Instancia o repositório para buscar o jogo pelo ID
    $gameRepository = new GameRepository($pdo);
    $game = $gameRepository->getById($id);

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
    $updated = $gameRepository->update($id, $title, $description, $imagePath);

    if ($updated) {
        header("Location: game-list.php");
        exit;
    } else {
        echo "Erro ao atualizar o jogo!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogo</title>
</head>
<body>
    <h1>Editar Jogo</h1>
    <form action="/game/update" method="POST">
        <input type="hidden" name="id" value="<?= $game['id']; ?>">
        
        <label for="name">Nome do Jogo:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($game['name']); ?>" required>
        
        <label for="description">Descrição:</label>
        <textarea id="description" name="description" required><?= htmlspecialchars($game['description']); ?></textarea>
        
        <label for="image">Imagem (URL):</label>
        <input type="text" id="image" name="image" value="<?= htmlspecialchars($game['image']); ?>">
        
        <button type="submit">Salvar</button>
    </form>
</body>
</html>


