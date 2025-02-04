<?php

namespace Ratinggames\App\Controllers;

class SignUpFormController implements Controller
{
    public function processaRequisicao(): void
    {
        require __DIR__ . '/../views/login-form.php';

    }
    
}
