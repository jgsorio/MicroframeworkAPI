<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\Uuid;

class User
{
    public function __construct(
        public Uuid|string $id = '',
        public ?string $name = null,
        public ?string $email = null,
        public ?string $password = null
    ){
        $this->id = !empty($this->id) ? new Uuid($this->id) : Uuid::random();
    }
}
