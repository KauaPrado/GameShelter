<?php
use Ratinggames\config\Database;
use Ratinggames\App\Models\Entity\Game;
use Ratinggames\App\Repository\GameRepository;

$pdo = Database::connect();

// Verifica se é edição (tem um ID na URL) ou adição
$isEditing = isset($_GET['id']);
$game = null;

// Se for edição, carrega os dados do jogo a partir do ID
if ($isEditing) {
    $id = $_GET['id'];
    $gameRepository = new GameRepository($pdo);
    $game = $gameRepository->getById($id);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEditing ? 'Editar Jogo' : 'Adicionar Jogo'; ?></title>
    <link rel="stylesheet" href="css/styleforms.css">
</head>
<body>
    <div class="form-container">
        <form action="<?= $isEditing ? '/editar-game' : '/adicionar-game'; ?>" method="post">
            <label for="game-title">Nome do Jogo</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                placeholder="Digite o nome do jogo" 
                value="<?= $isEditing && $game ? htmlspecialchars($game['title']) : ''; ?>" 
                required 
            />

            <label for="game-description">Descrição do jogo</label>
            <textarea 
                id="description" 
                name="description" 
                placeholder="Digite a descrição" 
                required><?= $isEditing && $game ? htmlspecialchars($game['description']) : ''; ?></textarea>

            <label for="game-image">Imagem</label>
            <textarea 
                id="image" 
                name="image" 
                placeholder="Digite a imagem" 
                required><?= $isEditing && $game ? htmlspecialchars($game['image']) : ''; ?></textarea>
            
            <?php if ($isEditing): ?>
                <input type="hidden" value="<?= $id; ?>" id="id" name="id">
            <?php endif; ?>

            <div class="buttons">
                <button type="button" class="btn-back" onclick="history.back()">Voltar</button>
                <button type="submit" class="btn-next"><?= $isEditing ? 'Salvar' : 'Adicionar'; ?></button>
            </div>
        </form>
    </div>
</body>
</html>
