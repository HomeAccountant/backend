<?php

namespace App\Users\Application\DTO;

use App\Users\Domain\Entity\User;

class UserDTO
{
	public function __construct(
		public readonly string $uuid,
		public readonly string $name,
		public readonly string $email,
		public readonly string $password,
	)
	{}

	public static function fromEntity(User $user): self
	{
		return new self(
			$user->getUuid(),
			$user->getName(),
			$user->getEmail(),
			$user->getPassword()
		);
	}

}
