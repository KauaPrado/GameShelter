 
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
        <form action="buscar-game" method="GET">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Pesquise o Jogo" 
                    value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" 
                />
                <button type="submit" class="filter-btn">🔍</button>
            </form>
            <a href='/adicionar-game' button class="add-btn">+</a>
        </div>
    </header>
    <main>
    <div class="games-container">
    <?php if (!empty($games)): ?>
        <div class="games-grid">
            <?php foreach ($games as $game):?>
                
                <div class="game-card">
                    <p><?= $game['title']?></p>
                    <div class="game-image">
                        <img src="/images/<?= $game['image'] ?: 'placeholder.png'; ?>" alt="<?= $game['title']; ?>" />
                    </div>
                    <div class="game-description"><?= $game['description']; ?></div>
                    <div class="game-actions">
                    <a href="/editar-game?id=<?= $game['id']; ?>" class="btn btn-edit">Editar</a>


                        <a href="/excluir-game?id=<?= $game['id']; ?>" class="delete-btn">EXCLUIR</a>
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
