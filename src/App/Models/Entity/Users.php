<?php
namespace Ratinggames\App\Models\Entity;

use Ratinggames\Config\Database;
use PDO;
class Users {
    // private $connection;
    private readonly ?int $id;
    private readonly string $login;
    private readonly string $password;

    public function __construct(
        ?int $id,
        string $login,
        string $password,
    )
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

}
