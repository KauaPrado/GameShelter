<?php

namespace Ratinggames\App\Controllers;

use Ratinggames\App\Models\Entity\Users;
use Ratinggames\App\Repository\UsersRepository;
use Ratinggames\Config\Database;
use PDO;
class LoginController implements Controller
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
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password'); 
        $checklogin = $this->usersrepository->UserVerify($email, $password);

        if($checklogin){
             
            $_SESSION['logged'] = true;
            header("Location: /");
        }
        else{
            header("Location: /login");
        }
        
    }
    
}
