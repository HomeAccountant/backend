<?php

namespace App\Users\Domain\Entity;

use App\Shared\Domain\Service\UuidService;

class User
{
	private string $uuid;
	private string $name;
	private string $email;
	private string $password;

	/**
	 * @param string $name
	 * @param string $email
	 * @param string $password
	 */
	public function __construct(string $name, string $email, string $password)
	{
		$this->uuid = UuidService::generate();
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
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
	public function getPassword(): string
	{
		return $this->password;
	}
}
