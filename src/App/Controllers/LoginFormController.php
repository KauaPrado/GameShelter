<?php

namespace Ratinggames\App\Controllers;

class LoginFormController implements Controller
{
    public function processaRequisicao(): void
    {
        require __DIR__ . '/../views/login-form.php';

    }
    
}
