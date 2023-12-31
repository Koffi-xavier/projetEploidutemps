<?php

namespace App\Entity;

use App\Repository\DisciplineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisciplineRepository::class)]
class Discipline
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'parentDisciplin')]
    private ?Ratio $ratio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getRatio(): ?Ratio
    {
        return $this->ratio;
    }

    public function setRatio(?Ratio $ratio): self
    {
        $this->ratio = $ratio;

        return $this;
    }
}
