<?php

namespace App\Entity;

use App\Repository\AgentsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgentsRepository::class)]
class Agents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $anneScolaire = null;

    #[ORM\Column(length: 10)]
    private ?string $matricule = null;

    #[ORM\Column(length: 5)]
    private ?string $civilite = null;

    #[ORM\Column(length: 10)]
    private ?string $sexe = null;

    #[ORM\Column(length: 30)]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $NomJeuneFille = null;

    #[ORM\Column(length: 10)]
    private ?string $volumeHoraie = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $premierePriseDeService = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEntreStructure = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'agents')]
    private ?Emploi $partentEmploi = null;

    #[ORM\ManyToOne(inversedBy: 'agents')]
    private ?StructureRatache $parentStructureRatachee = null;

    #[ORM\ManyToOne]
    private ?Discipline $discipline = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneScolaire(): ?string
    {
        return $this->anneScolaire;
    }

    public function setAnneScolaire(string $anneScolaire): self
    {
        $this->anneScolaire = $anneScolaire;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNomJeuneFille(): ?string
    {
        return $this->NomJeuneFille;
    }

    public function setNomJeuneFille(string $NomJeuneFille): self
    {
        $this->NomJeuneFille = $NomJeuneFille;

        return $this;
    }

    public function getVolumeHoraie(): ?string
    {
        return $this->volumeHoraie;
    }

    public function setVolumeHoraie(string $volumeHoraie): self
    {
        $this->volumeHoraie = $volumeHoraie;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPremierePriseDeService(): ?\DateTimeInterface
    {
        return $this->premierePriseDeService;
    }

    public function setPremierePriseDeService(\DateTimeInterface $premierePriseDeService): self
    {
        $this->premierePriseDeService = $premierePriseDeService;

        return $this;
    }

    public function getDateEntreStructure(): ?\DateTimeInterface
    {
        return $this->dateEntreStructure;
    }

    public function setDateEntreStructure(\DateTimeInterface $dateEntreStructure): self
    {
        $this->dateEntreStructure = $dateEntreStructure;

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

    public function getPartentEmploi(): ?Emploi
    {
        return $this->partentEmploi;
    }

    public function setPartentEmploi(?Emploi $partentEmploi): self
    {
        $this->partentEmploi = $partentEmploi;

        return $this;
    }

    public function getParentStructureRatachee(): ?StructureRatache
    {
        return $this->parentStructureRatachee;
    }

    public function setParentStructureRatachee(?StructureRatache $parentStructureRatachee): self
    {
        $this->parentStructureRatachee = $parentStructureRatachee;

        return $this;
    }

    public function getDiscipline(): ?Discipline
    {
        return $this->discipline;
    }

    public function setDiscipline(?Discipline $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }
}
