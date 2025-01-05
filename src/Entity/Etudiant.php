<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'etudiants')]
class Etudiant
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_etudiant', type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(name: 'prenom_etudiant', type: 'string', length: 50)]
    protected string $prenom;

    #[ORM\Column(name: 'nom_etudiant', type: 'string', length: 50)]
    protected string $nom;

    #[ORM\ManyToOne(targetEntity: Promotion::class)]
    #[ORM\JoinColumn('id_promotion', referencedColumnName: 'id_promotion', nullable: false)]
    protected Promotion $idPromotion;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getIdPromotion(): Promotion
    {
        return $this->idPromotion;
    }

    /**
     * @param Promotion $id_promotion
     */
    public function setIdPromotion(Promotion $idPromotion): void
    {
        $this->idPromotion = $idPromotion;
    }
}