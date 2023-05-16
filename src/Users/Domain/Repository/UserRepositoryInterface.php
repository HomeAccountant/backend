<?php

namespace App\Users\Domain\Repository;

use App\Users\Domain\Entity\User;

interface UserRepositoryInterface
{
	public function add(User $user): void;

	public function findByUuid(string $uuid): User;

	public function findByEmail(string $email): ?User;
}
