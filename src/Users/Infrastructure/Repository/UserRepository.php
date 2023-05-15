<?php

use App\Users\Domain\Entity\User;
use App\Users\Domain\Repository\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, User::class);
	}

	public function add(User $user): void
	{
		$this->_em->persist($user);
		$this->_em->flush();
	}

	public function findByUuid(string $uuid): User
	{
		return $this->find($uuid);
	}
}