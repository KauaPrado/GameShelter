<?php
namespace Ratinggames\App\Models\Entity;

use Ratinggames\Config\Database;
use PDO;
class Game {
    // private $connection;
    private readonly ?int $id;
    private readonly string $title;
    private readonly string $description;
    private readonly string $image;

    public function __construct(
        ?int $id,
        string $title,
        string $description,
        string $image
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }


    public function getId(): ?int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getImage(): string {
        return $this->image;
    }


    
    // public function __construct() {
    //     $db = new Database();
    //     $this->connection = $db->connect();
    // }

    // public function getAll() {
    //     $query = "SELECT * FROM games";
    //     $stmt = $this->connection->prepare($query);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}
