<?php

namespace App\Service\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllUsers(): array
    {
        $userRepository = $this->entityManager->getRepository(User::class);
        return $userRepository->findAll();
    }
}