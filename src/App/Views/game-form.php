<?php
Use Ratinggames\config\Database;
use Ratinggames\App\Models\Entity\Game;
use Ratinggames\app\Repository\GameRepository;

$pdo = Database::connect();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogo</title>
    <link rel="stylesheet" href="css/styleforms.css">
</head>
<body>
    <div class="form-container">
        <form action="/editar-game" method="post">
            <label for="game-name">Nome do Jogo</label>
            <input type="text" id="game-name" name="game-name" placeholder="Digite o nome do jogo" required />

            <label for="game-description">Descrição do jogo</label>
            <textarea id="game-description" name="game-description" placeholder="Digite a descrição" required></textarea>
            

            <div class="buttons">
                <button type="button" class="btn-back" onclick="history.back()">Voltar</button>
                <button type="submit" class="btn-next">Avançar</button>
            </div>
        </form>
    </div>
</body>
</html>



