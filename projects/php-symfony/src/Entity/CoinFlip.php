<?php

namespace App\Entity;

use App\Repository\CoinFlipRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoinFlipRepository::class)]
class CoinFlip
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Result = null;

    #[ORM\ManyToOne(inversedBy: 'coinFlips')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $users = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResult(): ?string
    {
        return $this->Result;
    }

    public function setResult(string $Result): static
    {
        $this->Result = $Result;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): static
    {
        $this->users = $users;

        return $this;
    }
}
