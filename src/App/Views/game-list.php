 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Jogos</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <div class="search-bar">
            <input type="text" placeholder="Pesquise o Jogo" />
            <button class="filter-btn">🔍</button>
            <button class="add-btn">+</button>
        </div>
    </header>
    <main>
    <div class="games-container">
    <?php if (!empty($games)): ?>
        <div class="games-grid">
            <?php foreach ($games as $game):?>
                
                <div class="game-card">
                    <div class="game-image">
                        <img src="<?= $game['image'] ?: 'placeholder.png'; ?>" alt="<?= $game['title']; ?>" />
                    </div>
                    <div class="game-description"><?= $game['description']; ?></div>
                    <div class="game-actions">
                    <a href="/editar-game?id=<?= $game['id']; ?>" class="btn btn-edit">Editar</a>


                        <button class="delete-btn">EXCLUIR</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Nenhum jogo encontrado.</p>
    <?php endif; ?>
</div>
    </main>
</body>
</html>
