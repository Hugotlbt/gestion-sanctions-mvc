<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'sanctions')]
class Sanction {
    #[ORM\Id]
    #[ORM\Column(name: 'id_sanction', type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\ManyToOne(targetEntity: Etudiant::class)]
    #[ORM\JoinColumn(name: 'id_etudiant', referencedColumnName: 'id', nullable: false)]
    protected Etudiant $etudiant;

    #[ORM\Column(name: 'nom_demandeur', type: 'string', length: 100)]
    protected string $nomDemandeur;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $motif = null;

    #[ORM\Column(name: 'description', type: 'text')]
    protected string $description;

    #[ORM\Column(name: 'date_incident', type: 'datetime')]
    protected \DateTime $dateIncident;

    #[ORM\Column(name: 'date_creation', type: 'datetime')]
    protected \DateTime $dateCreation;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id', nullable: false)]
    protected User $utilisateur;

    // Getters et Setters
    public function getId(): int {
        return $this->id;
    }

    public function getEtudiant(): Etudiant {
        return $this->etudiant;
    }

    public function setEtudiant(Etudiant $etudiant): void {
        $this->etudiant = $etudiant;
    }

    public function getNomDemandeur(): string {
        return $this->nomDemandeur;
    }

    public function setNomDemandeur(string $nomDemandeur): void {
        $this->nomDemandeur = $nomDemandeur;
    }

    public function setMotif(?string $motif): self
    {
        $this->motif = $motif;
        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getDateIncident(): \DateTime {
        return $this->dateIncident;
    }

    public function setDateIncident(\DateTime $dateIncident): void {
        $this->dateIncident = $dateIncident;
    }

    public function getDateCreation(): \DateTime {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTime $dateCreation): void {
        $this->dateCreation = $dateCreation;
    }

    public function getUtilisateur(): User {
        return $this->utilisateur;
    }

    public function setUtilisateur(User $utilisateur): void {
        $this->utilisateur = $utilisateur;
    }
}
