<?php

namespace App\UserStory;

use Doctrine\ORM\EntityManager;

class ImportCSV
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPromotion(): array
    {
        return $this->entityManager->getRepository(\App\Entity\Promotion::class)->findAll();
    }
}

