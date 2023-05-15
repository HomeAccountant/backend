<?php

namespace App\Shared\Domain\Service;

use Symfony\Component\Uid\Ulid;
use Symfony\Polyfill\Uuid\Uuid;

class UuidService
{
	public static function generate(): string
	{
		return Ulid::generate();
	}
}
