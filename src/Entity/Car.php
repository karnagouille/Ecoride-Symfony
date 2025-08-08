<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User; 

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $license_plate_number = null;

    #[ORM\Column(length: 255)]
    private ?string $first_registration = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $colors = null;

    #[ORM\Column(length: 255)]
    private ?string $Places_available = null;

    #[ORM\Column(length: 255)]
    private ?string $Preferences = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicensePlateNumber(): ?string
    {
        return $this->license_plate_number;
    }

    public function setLicensePlateNumber(string $license_plate_number): static
    {
        $this->license_plate_number = $license_plate_number;

        return $this;
    }

    public function getFirstRegistration(): ?string
    {
        return $this->first_registration;
    }

    public function setFirstRegistration(string $first_registration): static
    {
        $this->first_registration = $first_registration;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getColors(): ?string
    {
        return $this->colors;
    }

    public function setColors(string $colors): static
    {
        $this->colors = $colors;

        return $this;
    }

    public function getPlacesAvailable(): ?string
    {
        return $this->Places_available;
    }

    public function setPlacesAvailable(string $Places_available): static
    {
        $this->Places_available = $Places_available;

        return $this;
    }

    public function getPreferences(): ?string
    {
        return $this->Preferences;
    }

    public function setPreferences(string $Preferences): static
    {
        $this->Preferences = $Preferences;

        return $this;
    }

    // src/Entity/Car.php



#[ORM\ManyToOne(targetEntity: User::class, inversedBy: "cars")]
private ?User $owner = null;

public function getOwner(): ?User
{
    return $this->owner;
}

public function setOwner(?User $owner): self
{
    $this->owner = $owner;
    return $this;
}
}
