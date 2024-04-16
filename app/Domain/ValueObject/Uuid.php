<?php

namespace App\Domain\ValueObject;

use http\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    public function __construct(protected string $uuid)
    {
        $this->isValid($uuid);
    }

    public static function random(): string
    {
        return RamseyUuid::uuid4()->toString();
    }

    public function __toString(): string
    {
        return $this->uuid;
    }

    private function isValid(string $uuid): void
    {
        if (!RamseyUuid::isValid($uuid)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', __CLASS__, $uuid)
            );
        }
    }
}