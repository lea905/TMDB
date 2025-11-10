<?php

namespace App\Entity;
use App\Enum\emotion;

use App\Repository\ViewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ViewRepository::class)]
class View
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idUser = null;

    #[ORM\Column]
    private ?int $idElement = null;

    #[ORM\Column]
    private ?bool $see = null;

    #[ORM\Column(nullable: true)]
    private ?float $rating = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateSee = null;

    #[ORM\Column(enumType: emotion::class)]
    private ?emotion $emotion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdElement(): ?int
    {
        return $this->idElement;
    }

    public function setIdElement(int $idElement): static
    {
        $this->idElement = $idElement;

        return $this;
    }

    public function isSee(): ?bool
    {
        return $this->see;
    }

    public function setSee(bool $see): static
    {
        $this->see = $see;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getDateSee(): ?\DateTime
    {
        return $this->dateSee;
    }

    public function setDateSee(\DateTime $dateSee): static
    {
        $this->dateSee = $dateSee;

        return $this;
    }
    public function getEmotion(): ?emotion
    {
        return $this->emotion;
    }

    public function setEmotion(emotion $emotion): self
    {
        $this->emotion = $emotion;
        return $this;
    }
}
