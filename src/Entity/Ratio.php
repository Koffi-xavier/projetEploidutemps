<?php

namespace App\Entity;

use App\Repository\RatioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RatioRepository::class)]
class Ratio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $libele = null;

    #[ORM\Column]
    private ?float $CaracteristiqueRatio = null;

    #[ORM\OneToMany(mappedBy: 'parentDiscipline', targetEntity: Emploi::class)]
    private Collection $parentEmploi;

    #[ORM\OneToMany(mappedBy: 'ratio', targetEntity: Discipline::class)]
    private Collection $parentDisciplin;

    public function __construct()
    {
        $this->parentEmploi = new ArrayCollection();
        $this->parentDisciplin = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibele(): ?string
    {
        return $this->libele;
    }

    public function setLibele(string $libele): self
    {
        $this->libele = $libele;

        return $this;
    }

    public function getCaracteristiqueRatio(): ?float
    {
        return $this->CaracteristiqueRatio;
    }

    public function setCaracteristiqueRatio(float $CaracteristiqueRatio): self
    {
        $this->CaracteristiqueRatio = $CaracteristiqueRatio;

        return $this;
    }

    /**
     * @return Collection<int, Emploi>
     */
    public function getParentEmploi(): Collection
    {
        return $this->parentEmploi;
    }

    public function addParentEmploi(Emploi $parentEmploi): self
    {
        if (!$this->parentEmploi->contains($parentEmploi)) {
            $this->parentEmploi->add($parentEmploi);
            $parentEmploi->setParentDiscipline($this);
        }

        return $this;
    }

    public function removeParentEmploi(Emploi $parentEmploi): self
    {
        if ($this->parentEmploi->removeElement($parentEmploi)) {
            // set the owning side to null (unless already changed)
            if ($parentEmploi->getParentDiscipline() === $this) {
                $parentEmploi->setParentDiscipline(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Discipline>
     */
    public function getParentDisciplin(): Collection
    {
        return $this->parentDisciplin;
    }

    public function addParentDisciplin(Discipline $parentDisciplin): self
    {
        if (!$this->parentDisciplin->contains($parentDisciplin)) {
            $this->parentDisciplin->add($parentDisciplin);
            $parentDisciplin->setRatio($this);
        }

        return $this;
    }

    public function removeParentDisciplin(Discipline $parentDisciplin): self
    {
        if ($this->parentDisciplin->removeElement($parentDisciplin)) {
            // set the owning side to null (unless already changed)
            if ($parentDisciplin->getRatio() === $this) {
                $parentDisciplin->setRatio(null);
            }
        }

        return $this;
    }
}
