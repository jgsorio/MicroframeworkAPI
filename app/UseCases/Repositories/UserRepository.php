<?php

namespace App\UseCases\Repositories;

use App\Adapters\Mysql;
use App\Domain\Repositories\UserRepositoryInterface;
use PDO;

class UserRepository implements UserRepositoryInterface
{
    protected PDO $mysql;
    public function __construct(protected Mysql $sql)
    {
        $this->mysql = $this->sql->connect();
    }
    public function listAll(): array
    {
        $query = "SELECT * FROM users ORDER BY id DESC";
        $prepare = $this->mysql->prepare($query);
        $prepare->execute();
        return $prepare->fetchAll();
    }
}