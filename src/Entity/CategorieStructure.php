<?php

namespace App\Entity;

use App\Repository\CategorieStructureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieStructureRepository::class)]
class CategorieStructure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $codeCategorie = null;

    #[ORM\Column(length: 100)]
    private ?string $libelleCategorie = null;

    #[ORM\ManyToOne(inversedBy: 'categorieStructures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeDeStructure $parentTypeDeStructure = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\OneToMany(mappedBy: 'parentCategorieStructure', targetEntity: StructureRatache::class)]
    private Collection $structureRataches;

    public function __construct()
    {
        $this->structureRataches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeCategorie(): ?string
    {
        return $this->codeCategorie;
    }

    public function setCodeCategorie(string $codeCategorie): self
    {
        $this->codeCategorie = $codeCategorie;

        return $this;
    }

    public function getLibelleCategorie(): ?string
    {
        return $this->libelleCategorie;
    }

    public function setLibelleCategorie(string $libelleCategorie): self
    {
        $this->libelleCategorie = $libelleCategorie;

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

    /**
     * @return Collection<int, StructureRatache>
     */
    public function getStructureRataches(): Collection
    {
        return $this->structureRataches;
    }

    public function addStructureRatach(StructureRatache $structureRatach): self
    {
        if (!$this->structureRataches->contains($structureRatach)) {
            $this->structureRataches->add($structureRatach);
            $structureRatach->setParentCategorieStructure($this);
        }

        return $this;
    }

    public function removeStructureRatach(StructureRatache $structureRatach): self
    {
        if ($this->structureRataches->removeElement($structureRatach)) {
            // set the owning side to null (unless already changed)
            if ($structureRatach->getParentCategorieStructure() === $this) {
                $structureRatach->setParentCategorieStructure(null);
            }
        }

        return $this;
    }
}
