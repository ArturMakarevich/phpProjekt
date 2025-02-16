<?php

namespace App\Service\Games;

use App\Entity\RollDice;
use App\Repository\RollDiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class RollDiceService
{
    private $entityManager;
    private $repository;

    public function __construct(
        EntityManagerInterface $entityManager,
        RollDiceRepository $repository
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    public function roll(?UserInterface $user): array
    {
        $diceResult = rand(1, 6);
        
        if ($user !== null) {
            $rollDice = new RollDice();
            $rollDice->setRoll($diceResult);
            $rollDice->setUsers($user);
        
            $this->entityManager->persist($rollDice);
            $this->entityManager->flush();
        }
        
        $userResults = $user !== null ? $this->repository->findLastTenResultsByUser($user) : [];
        
        return [
            'diceResult' => $diceResult,
            'allResults' => $userResults,
            'positions' => $this->getDicePositions()
        ];
    }
    
    private function getDicePositions(): array
    {
        return [
            1 => [['top' => '50%', 'left' => '50%']],
            2 => [['top' => 20, 'left' => 20], ['top' => 120, 'left' => 120]],
            3 => [['top' => 20, 'left' => 120], ['top' => '50%', 'left' => '50%'], ['top' => 120, 'left' => 20]],
            4 => [['top' => 20, 'left' => 20], ['top' => 20, 'left' => 120], ['top' => 120, 'left' => 20], ['top' => 120, 'left' => 120]],
            5 => [['top' => 20, 'left' => 20], ['top' => 20, 'left' => 120], ['top' => '50%', 'left' => '50%'], ['top' => 120, 'left' => 20], ['top' => 120, 'left' => 120]],
            6 => [['top' => 20, 'left' => 20], ['top' => "50%", 'left' => 120], ['top' => 20, 'left' => 120], ['top' => 120, 'left' => 20], ['top' => '50%', 'left' => 20], ['top' => 120, 'left' => 120]],
        ];
    }
}