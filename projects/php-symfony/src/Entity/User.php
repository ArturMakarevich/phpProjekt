<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToMany(targetEntity: CoinFlip::class, mappedBy: 'users')]
    private Collection $coinFlips;

    #[ORM\OneToMany(targetEntity: RandomNumber::class, mappedBy: 'users')]
    private Collection $randomNumbers;

    #[ORM\OneToMany(targetEntity: RollDice::class, mappedBy: 'users')]
    private Collection $rollDices;

    public function __construct()
    {
        $this->coinFlips = new ArrayCollection();
        $this->randomNumbers = new ArrayCollection();
        $this->rollDices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
    $roles = $this->roles;
    $roles[] = 'ROLE_USER';
    return array_unique($roles);
    }   

    public function setRoles(array $roles): static
    {   
    if (in_array('ROLE_ADMIN', $roles, true)) {
        $this->roles = ['ROLE_ADMIN']; 
    } else {
        $this->roles = array_unique($roles);
    }

    return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function eraseCredentials(): void
    {
        
    }

    /**
     * @return Collection<int, CoinFlip>
     */
    public function getCoinFlips(): Collection
    {
        return $this->coinFlips;
    }

    public function addCoinFlip(CoinFlip $coinFlip): static
    {
        if (!$this->coinFlips->contains($coinFlip)) {
            $this->coinFlips->add($coinFlip);
            $coinFlip->setUsers($this);
        }

        return $this;
    }

    public function removeCoinFlip(CoinFlip $coinFlip): static
    {
        if ($this->coinFlips->removeElement($coinFlip)) {
            
            if ($coinFlip->getUsers() === $this) {
                $coinFlip->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RandomNumber>
     */
    public function getRandomNumbers(): Collection
    {
        return $this->randomNumbers;
    }

    public function addRandomNumber(RandomNumber $randomNumber): static
    {
        if (!$this->randomNumbers->contains($randomNumber)) {
            $this->randomNumbers->add($randomNumber);
            $randomNumber->setUsers($this);
        }

        return $this;
    }

    public function removeRandomNumber(RandomNumber $randomNumber): static
    {
        if ($this->randomNumbers->removeElement($randomNumber)) {
            
            if ($randomNumber->getUsers() === $this) {
                $randomNumber->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RollDice>
     */
    public function getRollDices(): Collection
    {
        return $this->rollDices;
    }

    public function addRollDice(RollDice $rollDice): static
    {
        if (!$this->rollDices->contains($rollDice)) {
            $this->rollDices->add($rollDice);
            $rollDice->setUsers($this);
        }

        return $this;
    }

    public function removeRollDice(RollDice $rollDice): static
    {
        if ($this->rollDices->removeElement($rollDice)) {
            
            if ($rollDice->getUsers() === $this) {
                $rollDice->setUsers(null);
            }
        }

        return $this;
    }
}
