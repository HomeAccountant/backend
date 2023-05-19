<?php

namespace App\Users\Infrastructure\Controller;

use App\Shared\Domain\Security\UserFetcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/users/me', methods: ['GET'])]
class GetMeAction
{
    public function __construct(private readonly UserFetcherInterface $userFetcher)
    {
    }

    public function __invoke()
    {
        $user = $this->userFetcher->getAuthUser();

        return new JsonResponse([
            'uuid' => $user->getUuid(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
        ]);
    }
}
