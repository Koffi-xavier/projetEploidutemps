<?php

namespace App\Entity;

use App\Repository\StructureRatacheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StructureRatacheRepository::class)]
class StructureRatache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $CodeStructureRatachee = null;

    #[ORM\Column(length: 255)]
    private ?string $LibelleStructureRatachee = null;

    #[ORM\ManyToOne(inversedBy: 'structureRataches')]
    private ?CategorieStructure $parentCategorieStructure = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\OneToMany(mappedBy: 'parentStructureRatachee', targetEntity: Agents::class)]
    private Collection $agents;

    public function __construct()
    {
        $this->agents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeStructureRatachee(): ?string
    {
        return $this->CodeStructureRatachee;
    }

    public function setCodeStructureRatachee(string $CodeStructureRatachee): self
    {
        $this->CodeStructureRatachee = $CodeStructureRatachee;

        return $this;
    }

    public function getLibelleStructureRatachee(): ?string
    {
        return $this->LibelleStructureRatachee;
    }

    public function setLibelleStructureRatachee(string $LibelleStructureRatachee): self
    {
        $this->LibelleStructureRatachee = $LibelleStructureRatachee;

        return $this;
    }

    public function getParentCategorieStructure(): ?CategorieStructure
    {
        return $this->parentCategorieStructure;
    }

    public function setParentCategorieStructure(?CategorieStructure $parentCategorieStructure): self
    {
        $this->parentCategorieStructure = $parentCategorieStructure;

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
     * @return Collection<int, Agents>
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    public function addAgent(Agents $agent): self
    {
        if (!$this->agents->contains($agent)) {
            $this->agents->add($agent);
            $agent->setParentStructureRatachee($this);
        }

        return $this;
    }

    public function removeAgent(Agents $agent): self
    {
        if ($this->agents->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getParentStructureRatachee() === $this) {
                $agent->setParentStructureRatachee(null);
            }
        }

        return $this;
    }
}
