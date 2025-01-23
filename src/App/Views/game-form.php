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
            <label for="game-title">Nome do Jogo</label>
            <input type="text" id="title" name="title" placeholder="Digite o nome do jogo" required />

            <label for="game-description">Descrição do jogo</label>
            <textarea id="description" name="description" placeholder="Digite a descrição" required></textarea>



            <label for="game-image">imagem</label>
            <textarea id="image" name="image" placeholder="Digite a imagem" required></textarea>
            <input type="text" hidden value="<?php echo $_GET['id']; ?>" id="id" name="id">

            <div class="buttons">
                <button type="button" class="btn-back" onclick="history.back()">Voltar</button>
                <button type="submit" class="btn-next">Avançar</button>
            </div>
        </form>
    </div>
</body>
</html>



