<?php

namespace App\Entity;

use App\Repository\EmploiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmploiRepository::class)]
class Emploi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $LibelleEmploi = null;

    #[ORM\ManyToOne(inversedBy: 'emplois')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Grade $ParentGrade = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\OneToMany(mappedBy: 'partentEmploi', targetEntity: Agents::class)]
    private Collection $agents;

    public function __construct()
    {
        $this->agents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleEmploi(): ?string
    {
        return $this->LibelleEmploi;
    }

    public function setLibelleEmploi(string $LibelleEmploi): self
    {
        $this->LibelleEmploi = $LibelleEmploi;

        return $this;
    }

    public function getParentGrade(): ?Grade
    {
        return $this->ParentGrade;
    }

    public function setParentGrade(?Grade $ParentGrade): self
    {
        $this->ParentGrade = $ParentGrade;

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
            $agent->setPartentEmploi($this);
        }

        return $this;
    }

    public function removeAgent(Agents $agent): self
    {
        if ($this->agents->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getPartentEmploi() === $this) {
                $agent->setPartentEmploi(null);
            }
        }

        return $this;
    }
}
