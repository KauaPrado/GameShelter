<?php
namespace Ratinggames\Config;

use PDO;
use PDOException;

class Database{
    private $host = 'localhost';  // Servidor do banco
    private $dbname = 'datagaming';  // Nome do banco
    private $user = 'root';  // Usuário padrão
    private $pass = 'kaua2024!';  // Senha padrão (deixe vazia para XAMPP/WAMP)
    public $connection;

    public static function connect(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=datagaming', 'root', 'kaua2024!');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
        return $pdo;
    }
}

