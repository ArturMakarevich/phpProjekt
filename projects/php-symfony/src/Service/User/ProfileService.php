<?php

namespace App\Service\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProfileService
{
    private $entityManager;
    private $passwordHasher;
    private $validator;

    public function __construct(
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        ValidatorInterface $validator
    ) {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
        $this->validator = $validator;
    }

    public function updateProfile(User $user, string $newUsername = null, string $newPassword = null): array
    {
        $hasChanges = false;
        $messages = [];

        if (!empty($newUsername) && $newUsername !== $user->getUsername()) {
            $user->setUsername($newUsername);
            $hasChanges = true;
        }

        if (!empty($newPassword)) {
            $user->setPassword($this->passwordHasher->hashPassword($user, $newPassword));
            $hasChanges = true;
        }

        if ($hasChanges) {
            $errors = $this->validator->validate($user);
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    $messages['error'][] = $error->getMessage();
                }
                return $messages;
            }

            $this->entityManager->flush();
            $messages['notice'] = 'Profile updated successfully.';
        }

        return $messages;
    }
}