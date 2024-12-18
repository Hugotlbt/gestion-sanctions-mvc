<?php

namespace App\UserStory;

use App\Entity\Etudiant;
use App\Entity\Promotion;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class ImportCSV
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPromotion(): array
    {
        $repository = $this -> entityManager -> getRepository(Promotion::class);
        return $repository -> findAll();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function execute(string $prenom, int $nom, string $libelle): Etudiant
    {
        // Vérifier que des données sont présentes
        if (empty($prenom) ||empty($nom)) {
            throw new \Exception("Un ou plusieurs champs sont vide.");
        }


        // Créer une instance de la classe User avec l'email, le pseudo et le mot de passe haché
        $etudiant = new Etudiant();
        $etudiant->setPrenom($prenom);
        $etudiant->setNom($nom);
        $etudiant->setIdPromotion($libelle);

        // Persister l'instance en utilisant l'entity manager
        $this->entityManager->persist($etudiant);
        $this->entityManager->flush();

        return $etudiant;
    }
}

