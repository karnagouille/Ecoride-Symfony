<?php

namespace App\Entity;

use App\Repository\CovoitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CovoitRepository::class)]
class Covoit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_depart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $heure_depart = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu_depart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $heure_arrivee = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu_arrivee = null;

    #[ORM\Column(length: 255)]
    private ?string $nb_place = null;

    #[ORM\Column]
    private ?float $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDepart(): ?\DateTime
    {
        return $this->date_depart;
    }

    public function setDateDepart(\DateTime $date_depart): static
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    public function getHeureDepart(): ?\DateTime
    {
        return $this->heure_depart;
    }

    public function setHeureDepart(\DateTime $heure_depart): static
    {
        $this->heure_depart = $heure_depart;

        return $this;
    }

    public function getLieuDepart(): ?string
    {
        return $this->lieu_depart;
    }

    public function setLieuDepart(string $lieu_depart): static
    {
        $this->lieu_depart = $lieu_depart;

        return $this;
    }

    public function getHeureArrivee(): ?\DateTime
    {
        return $this->heure_arrivee;
    }

    public function setHeureArrivee(\DateTime $heure_arrivee): static
    {
        $this->heure_arrivee = $heure_arrivee;

        return $this;
    }

    public function getLieuArrivee(): ?string
    {
        return $this->lieu_arrivee;
    }

    public function setLieuArrivee(string $lieu_arrivee): static
    {
        $this->lieu_arrivee = $lieu_arrivee;

        return $this;
    }

    public function getNbPlace(): ?string
    {
        return $this->nb_place;
    }

    public function setNbPlace(string $nb_place): static
    {
        $this->nb_place = $nb_place;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}
