<?php

    

    $login = isset($_GET['id']);
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $login ?  "Página de Login" : "Página de cadastro"; ?> </title>
    <link rel="stylesheet" href="css/stylelogin.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="<?= $login ? 'login' : 'signUp'; ?>" method="post">
            <label for="login">EMAIL</label>
            <input type="text" id="email" name="email" placeholder="Digite seu login" required>

            <label for="senha">SENHA</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>

            <div class="button-group">
                <button type="button" onclick="history.back()">Voltar</button>
                <button type="submit">Avançar</button>
            </div>
        </form>
    </div>
</body>
</html>
