<?php
namespace Ratinggames\app\Repository;
USE Ratinggames\Config\Database;
use PDO;


Class UsersRepository {
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $query = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function UserVerify($email, $password): bool
    {
        $query = 'SELECT * FROM users WHERE email LIKE :email;';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        $correctPassword = password_verify($password, $userData['password'] ?? '');
        return $correctPassword;
        
    }

  
    public function add($email, $password){
        $password = password_hash($password, PASSWORD_ARGON2ID);
        $query  = 'INSERT INTO users (email, password) VALUES
                                     (:email, :password);';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();


    }
} 