<?php

namespace App\Shared\Domain\Service;

use Symfony\Component\Uid\Ulid;

class UuidService
{
    public static function generate(): string
    {
        return Ulid::generate();
    }
}
