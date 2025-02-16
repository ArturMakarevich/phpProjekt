<?php

namespace App\Service\Games;

use App\Entity\RandomNumber;
use App\Repository\RandomNumberRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class RandomNumberService
{
    private $entityManager;
    private $repository;

    public function __construct(
        EntityManagerInterface $entityManager,
        RandomNumberRepository $repository
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    public function generate(?UserInterface $user): array
    {
        $randomNumber = rand(1, 100);

        if ($user !== null) {
            $randNum = new RandomNumber();
            $randNum->setNumresult($randomNumber);
            $randNum->setUsers($user);

            $this->entityManager->persist($randNum);
            $this->entityManager->flush();
        }

        $userResults = $user !== null ? $this->repository->findLastTenResultsByUser($user) : [];
        
        return [
            'randomNumber' => $randomNumber,
            'allResults' => $userResults,
        ];
    }
}