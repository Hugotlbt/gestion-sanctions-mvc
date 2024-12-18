<?php

namespace App\UserStory;

use App\Entity\Promotion;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class CreatePromotion
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function execute(string $libelle, int $date): Promotion
    {
        // Vérifier que des données sont présentes
        if (empty($libelle) ||empty($date)) {
            throw new \Exception("Un ou plusieurs champs sont vide.");
        }
        if (!preg_match('/[A-Z]/', $libelle)|| !preg_match('/\d/', $libelle)){
            throw new \Exception("Le nom de la promotion doit contenir des lettres et des chiffres");
        }
        if (preg_match('/[a-z]/', $date)){
            throw new \Exception("La date ne peux pas continir des lettres");
        }

        // Créer une instance de la classe User avec l'email, le pseudo et le mot de passe haché
        $promotion = new Promotion();
        $promotion->setLibelle($libelle);
        $promotion->setAnnee($date);

        // Persister l'instance en utilisant l'entity manager
        $this->entityManager->persist($promotion);
        $this->entityManager->flush();

        return $promotion;
    }
}

