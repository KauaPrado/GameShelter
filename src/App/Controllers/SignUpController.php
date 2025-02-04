<?php

namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Users;
use Ratinggames\App\Repository\UsersRepository;
use Ratinggames\Config\Database;
use PDO;
class SignUpController implements Controller
{
    private PDO $pdo;
    private UsersRepository $usersrepository;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->usersrepository= new UsersRepository($this->pdo);
    }
    public function processaRequisicao(): void
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->usersrepository->add($email, $password);
            header("Location: /");
        }
        else
        {
            header("Location: /signUp?sucesso=0");
        }
        
        
    }
    
}
