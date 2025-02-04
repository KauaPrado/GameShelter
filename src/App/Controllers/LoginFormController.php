<?php

namespace Ratinggames\App\Controllers;

class LoginFormController implements Controller
{
    public function processaRequisicao(): void
    {

        if (($_SESSION['logged'] ?? false) === true)
        {
            header('Location: /');
            return;
        }
        require __DIR__ . '/../views/login-form.php';

    }
    
}
