<?php

namespace App\UserStory;

use App\Entity\Sanction;
use App\Entity\Etudiant;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class CreateSanction
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     * @throws \Exception
     */
    public function execute(
        Etudiant $etudiant,
        string $nomDemandeur,
        string $motif,
        string $description,
        \DateTime $dateIncident,
        User $utilisateur
    ): Sanction {
        // Vérifier que tous les champs obligatoires sont remplis
        if (empty($etudiant) || empty($nomDemandeur) || empty($motif) || empty($description) || empty($dateIncident)) {
            throw new \Exception("Un ou plusieurs champs sont vides.");
        }

        // Vérifier le format du nom du demandeur
        if (!preg_match('/^[a-zA-Z\s\-]+$/', $nomDemandeur)) {
            throw new \Exception("Le nom du demandeur contient des caractères invalides.");
        }

        // Vérifier la longueur de la description
        if (strlen($description) < 10) {
            throw new \Exception("La description doit contenir au moins 10 caractères.");
        }

        // Vérifier que la date de l'incident n'est pas dans le futur
        $now = new \DateTime();
        if ($dateIncident > $now) {
            throw new \Exception("La date de l'incident ne peut pas être dans le futur.");
        }
        

        // Créer une instance de la classe Sanction avec les données validées
        $sanction = new Sanction();
        $sanction->setEtudiant($etudiant);
        $sanction->setNomDemandeur($nomDemandeur);
        $sanction->setMotif($motif);
        $sanction->setDescription($description);
        $sanction->setDateIncident($dateIncident);
        $sanction->setDateCreation(new \DateTime()); // Date actuelle
        $sanction->setUtilisateur($utilisateur);

        // Persister l'instance en utilisant l'entity manager
        $this->entityManager->persist($sanction);
        $this->entityManager->flush();

        return $sanction;
    }
}

