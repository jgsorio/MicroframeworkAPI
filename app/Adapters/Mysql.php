<?php

namespace App\Adapters;

use App\Adapters\Interfaces\MysqlAdapterInterface;
use PDO;
use PDOException;

class Mysql implements MysqlAdapterInterface
{
    protected string $sgbd;
    protected string $host;
    protected string $user;
    protected string $password;
    protected string $database;
    protected ?PDO $pdo = null;
    public function __construct()
    {
        $this->sgbd = $_ENV['DB_DRIVER'];
        $this->host = $_ENV['DB_HOST'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
        $this->database = $_ENV['DB_NAME'];
        $this->connect();
    }
    public function connect(): PDO
    {
        try {
            if (!$this->pdo) {
                $this->pdo = new PDO("{$this->sgbd}:host={$this->host};dbname={$this->database}", $this->user, $this->password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]);

            }

            return $this->pdo;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}
