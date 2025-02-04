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
            <input type="text" id="email" name="email" placeholder="Digite seu login">

            <label for="senha">SENHA</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha">

            <div class="button-group">
               
                <button type="submit">Avançar</button>
                </form>
            </div>
            <div class="button-group">
                <?= $login ?  " <a  href='/signUp'><button class='login-btn'>SignUp</button></a>  "
                :  "<a  href='/login?id=0'><button class='login-btn'>Login</button></a>";?>
            </div> 
    </div>
    
</body>
</html>
