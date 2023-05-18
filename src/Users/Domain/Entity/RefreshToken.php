<?php

namespace App\Users\Domain\Entity;

class RefreshToken
{
	private int $id;
	private string $refreshToken;
	private string $username;
	private $valid;

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getRefreshToken(): string
	{
		return $this->refreshToken;
	}

	/**
	 * @return string
	 */
	public function getUsername(): string
	{
		return $this->username;
	}

	/**
	 * @return mixed
	 */
	public function getValid()
	{
		return $this->valid;
	}


}
