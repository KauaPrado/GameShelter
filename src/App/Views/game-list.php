 
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
            <a href='/adicionar-game'> <button class="add-btn">+</button></a>
            
        </div>
    </header>
    <main>
    <div class="games-container">
    <?php if (!empty($games)): ?>
        <div class="games-grid">
            <?php foreach ($games as $game):?>
                
                <div class="game-card">
                    <p><h1><?= $game['title']?></h1></p>
                    <div class="game-image">
                        <img src="/images/<?= $game['image'] ?: 'placeholder.png'; ?>" alt="<?= $game['title']; ?>" />
                    </div>
                    <div class="game-description"><?= $game['description']; ?></div>
                    <div class="game-actions">
                    <a href="/editar-game?id=<?= $game['id']; ?>"> <button class="edit-btn">EDITAR</button></a>


                        <a href="/excluir-game?id=<?= $game['id']; ?>"><button class="delete-btn"> EXCLUIR </button></a>
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
