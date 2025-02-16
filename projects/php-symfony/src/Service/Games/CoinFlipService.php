<?php

namespace App\Service\Games;

use App\Entity\CoinFlip;
use App\Repository\CoinFlipRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class CoinFlipService
{
    private $entityManager;
    private $repository;

    public function __construct(
        EntityManagerInterface $entityManager,
        CoinFlipRepository $repository
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    public function flip(?UserInterface $user): array
    {
        $coinResult = rand(0, 1) == 1 ? 'HEADS' : 'TAILS';
        
        if ($user !== null) {
            $coinFlip = new CoinFlip();
            $coinFlip->setResult($coinResult);
            $coinFlip->setUsers($user);
            
            $this->entityManager->persist($coinFlip);
            $this->entityManager->flush();
        }

        $userResults = $user !== null ? $this->repository->findLastTenResultsByUser($user) : [];
        
        return [
            'coinResult' => $coinResult,
            'allResults' => $userResults,
        ];
    }
}