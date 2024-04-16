<?php

namespace App\Adapters\Interfaces;

use PDO;

interface MysqlAdapterInterface
{
    public function connect(): PDO;
}