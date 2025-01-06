<?php

namespace App\UserStory;

use App\Entity\Etudiant;
use App\Entity\Motif;
use App\Entity\Sanction;
use Doctrine\ORM\EntityManager;

class CreateSanction
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(
        ?int $eleveId,
        ?int $motifId,
        ?string $descriptionMotif,
        ?string $dateIncident,
        ?string $demandeur,
        ?string $creePar
    ): Sanction {
        // Validation des champs obligatoires
        if (empty($eleveId) || empty($descriptionMotif) || empty($dateIncident) || empty($demandeur)) {
            throw new \Exception("Tous les champs obligatoires doivent être renseignés.");
        }

        // Vérification de l'élève
        $eleve = $this->entityManager->getRepository(Etudiant::class)->find($eleveId);
        if (!$eleve) {
            throw new \Exception("L'élève sélectionné est introuvable.");
        }

        // Vérification du motif (si sélectionné)
        $motif = $motifId
            ? $this->entityManager->getRepository(Motif::class)->find($motifId)
            : null;
        if ($motifId && !$motif) {
            throw new \Exception("Le motif sélectionné est introuvable.");
        }

        // Validation de la date de l'incident
        $dateIncidentObj = \DateTime::createFromFormat('Y-m-d', $dateIncident);
        if (!$dateIncidentObj || $dateIncidentObj > new \DateTime()) {
            throw new \Exception("La date de l'incident est invalide ou dans le futur.");
        }

        // Validation de la description du motif
        if (strlen($descriptionMotif) < 10) {
            throw new \Exception("La description du motif doit comporter au moins 10 caractères.");
        }
        if (strlen($descriptionMotif) > 255) {
            throw new \Exception("La description du motif ne peut pas dépasser 255 caractères.");
        }

        // Validation de la longueur du nom du demandeur
        if (strlen($demandeur) > 100) {
            throw new \Exception("Le nom du demandeur ne peut pas dépasser 100 caractères.");
        }

        // Création de la sanction
        $sanction = new Sanction();
        $sanction->setEleve($eleve);
        $sanction->setMotif($motif);
        $sanction->setDescriptionMotif($descriptionMotif);
        $sanction->setDateIncident($dateIncidentObj);
        $sanction->setDemandeur($demandeur);
        $sanction->setCreePar($creePar);

        // Sauvegarde dans la base de données
        $this->entityManager->persist($sanction);
        $this->entityManager->flush();

        return $sanction;
    }
}
