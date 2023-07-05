<?php

namespace App\Entity;

use App\Repository\TypeDeStructureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeDeStructureRepository::class)]
class TypeDeStructure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\OneToMany(mappedBy: 'parentTypeDeStructure', targetEntity: CategorieStructure::class, orphanRemoval: true)]
    private Collection $categorieStructures;

    public function __construct()
    {
        $this->categorieStructures = new ArrayCollection();
    }

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
     * @return Collection<int, CategorieStructure>
     */
    public function getCategorieStructures(): Collection
    {
        return $this->categorieStructures;
    }

    public function addCategorieStructure(CategorieStructure $categorieStructure): self
    {
        if (!$this->categorieStructures->contains($categorieStructure)) {
            $this->categorieStructures->add($categorieStructure);
            $categorieStructure->setParentTypeDeStructure($this);
        }

        return $this;
    }

    public function removeCategorieStructure(CategorieStructure $categorieStructure): self
    {
        if ($this->categorieStructures->removeElement($categorieStructure)) {
            // set the owning side to null (unless already changed)
            if ($categorieStructure->getParentTypeDeStructure() === $this) {
                $categorieStructure->setParentTypeDeStructure(null);
            }
        }

        return $this;
    }
}
