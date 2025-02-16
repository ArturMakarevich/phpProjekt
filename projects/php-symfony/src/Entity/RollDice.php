<?php

namespace App\Entity;

use App\Repository\RollDiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RollDiceRepository::class)]
class RollDice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Roll = null;

    #[ORM\ManyToOne(inversedBy: 'rollDices')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $users = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoll(): ?int
    {
        return $this->Roll;
    }

    public function setRoll(int $Roll): static
    {
        $this->Roll = $Roll;

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
