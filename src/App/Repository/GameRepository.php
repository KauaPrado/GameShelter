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
    
    
    public function update($id, $title, $description, $image) {
        $query = "UPDATE games SET title = :title, description = :description, image = :image WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    public function add($title, $description, $image){

        $query = 'INSERT INTO games (title, description, image) VALUES
                (:title,
                 :description,
                  :image);';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();

    }

    public function remove($id){

        $query = 'DELETE FROM games where id = :id;';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();

    }
    

}