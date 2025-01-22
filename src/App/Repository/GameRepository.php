<?php
namespace Ratinggames\app\Repository;
USE Ratinggames\Config\Database;
use PDO;


Class GameRepository {
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $query = "SELECT * FROM games";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM games WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function update($id, $name, $description, $image) {
        $query = "UPDATE games SET name = :name, description, = :description, image = :image, rating = :rating WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
        return $stmt->execute();
    }
    

    
    

}