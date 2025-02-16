<?php

namespace App\Entity;

use App\Repository\RandomNumberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RandomNumberRepository::class)]
class RandomNumber
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Numresult = null;

    #[ORM\ManyToOne(inversedBy: 'randomNumbers')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $users = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumresult(): ?int
    {
        return $this->Numresult;
    }

    public function setNumresult(int $Numresult): static
    {
        $this->Numresult = $Numresult;

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
