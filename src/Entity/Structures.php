<?php

namespace App\Entity;

use App\Repository\StructuresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StructuresRepository::class)]
class Structures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 100)]
    private ?string $libelleStructure = null;

    #[ORM\Column(length: 5)]
    private ?string $AnneDeCreation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeDeStructure $parentTypeDeStructure = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLibelleStructure(): ?string
    {
        return $this->libelleStructure;
    }

    public function setLibelleStructure(string $libelleStructure): self
    {
        $this->libelleStructure = $libelleStructure;

        return $this;
    }

    public function getAnneDeCreation(): ?string
    {
        return $this->AnneDeCreation;
    }

    public function setAnneDeCreation(string $AnneDeCreation): self
    {
        $this->AnneDeCreation = $AnneDeCreation;

        return $this;
    }

    public function getParentTypeDeStructure(): ?TypeDeStructure
    {
        return $this->parentTypeDeStructure;
    }

    public function setParentTypeDeStructure(?TypeDeStructure $parentTypeDeStructure): self
    {
        $this->parentTypeDeStructure = $parentTypeDeStructure;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
