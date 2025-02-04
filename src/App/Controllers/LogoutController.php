<?php

namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Game;
use Ratinggames\App\Repository\GameRepository;
use Ratinggames\Config\Database;
use PDO;

class LogoutController implements Controller
{
    
    public function processaRequisicao()
    {
        session_destroy();
        header('Location: /login');
    }
}
