<?php

namespace App\Tests\Functional\Users\Infrastructure\Repository;

use App\Users\Domain\Factory\UserFactory;
use App\Users\Infrastructure\Repository\UserRepository;
use Faker\Factory;
use Faker\Generator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserRepositoryTest extends WebTestCase
{
	private UserRepository $repository;
	private Generator $faker;

	public function setUp(): void
	{
		parent::setUp();
		$this->repository = static::getContainer()->get(UserRepository::class);
		$this->faker = Factory::create();
	}

	public function test_user_added_successfully(): void
	{
		$name = $this->faker->name();
		$email = $this->faker->email();
		$password = $this->faker->password();
		$user = (new UserFactory())->create($name, $email, $password);

		$this->repository->add($user);

		$existingUser = $this->repository->findByUuid($user->getUuid());
		$this->assertEquals($user->getUuid(), $existingUser->getUuid());
	}
}
