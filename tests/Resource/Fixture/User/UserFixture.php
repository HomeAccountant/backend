<?php

namespace App\Tests\Resource\Fixture\User;

use App\Tests\Tools\FakerTools;
use App\Users\Domain\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture
{
	use FakerTools;

	const REFERENCE = 'user';

	public function __construct(private readonly UserFactory $userFactory)
	{
	}

	public function load(ObjectManager $manager)
	{
		$name = $this->getFaker()->name();
		$email = $this->getFaker()->email();
		$password = $this->getFaker()->password();
		$user = $this->userFactory->create($name, $email, $password);

		$manager->persist($user);
		$manager->flush();

		$this->addReference(self::REFERENCE, $user);
	}
}