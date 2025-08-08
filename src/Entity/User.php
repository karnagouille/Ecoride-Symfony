<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Car;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['mail'], message: 'There is already an account with this mail')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $surname = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $mail = null;

    #[ORM\column(length : 255, unique : true)]
    private ?string $pseudo = null; 

    private ?string $password = null;

    #[ORM\Column(type: 'json')]
    private array $roles = [];


    #[ORM\OneToMany(mappedBy: "owner", targetEntity: Car::class)]
    private Collection $cars;


#[Assert\NotBlank(message: "Vous devez saisir un mot de passe")]
#[Assert\Length(
    min: 6,
    minMessage: "Votre mot de passe doit faire au moins {{ limit }} caractères"
)]
private ?string $plainPassword = null;

public function getPlainPassword(): ?string
{
    return $this->plainPassword;
}

public function setPlainPassword(?string $plainPassword): self
{
    $this->plainPassword = $plainPassword;
    return $this;
}


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): static
    {
        $this->surname = $surname;
        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;
        return $this;
    }
// garantit un rôle 

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER'; 
        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->mail ?? '';
    }

    public function eraseCredentials(): void
    {

    }

public function __construct()
{
    $this->cars = new ArrayCollection();
}

public function getCars(): Collection
{
    return $this->cars;
}




}

