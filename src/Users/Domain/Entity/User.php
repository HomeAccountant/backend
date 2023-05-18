<?php

namespace App\Users\Domain\Entity;

use App\Shared\Domain\Security\AuthUserInterface;
use App\Shared\Domain\Service\UuidService;
use App\Users\Domain\Service\UserPasswordHasherInterface;

class User implements AuthUserInterface
{
	private string $uuid;
	private string $name;
	private string $email;
	private ?string $password = null;

	/**
	 * @param string $name
	 * @param string $email
	 */
	public function __construct(string $name, string $email)
	{
		$this->uuid = UuidService::generate();
		$this->name = $name;
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getUuid(): string
	{
		return $this->uuid;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @return string
	 */
	public function getPassword(): ?string
	{
		return $this->password;
	}

	public function getRoles(): array
	{
		return [
			'ROLE_USER',
		];
	}

	public function eraseCredentials()
	{

	}

	public function getUserIdentifier(): string
	{
		return $this->email;
	}

	public function setPassword(?string $password, UserPasswordHasherInterface $passwordHasher): void
	{
		if (is_null($password)) {
			$this->password = null;
		} else {
			$this->password = $passwordHasher->hash($this, $password);

		}
	}
}
