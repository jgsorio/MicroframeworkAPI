<?php

namespace App\Domain\Repositories;

interface UserRepositoryInterface
{
    public function listAll(): array;
}
