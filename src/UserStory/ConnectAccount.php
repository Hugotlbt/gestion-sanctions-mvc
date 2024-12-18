<?php

namespace App\UserStory;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
class ConnectAccount
{
    protected EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        //L'entityManager est injecté par dépendance
        $this->entityManager = $entityManager;
    }

    public function execute(string $mail,string $password)
    {
        // Vérifier que des données sont présentes
        $repository = $this->entityManager->getRepository(User::class);
        if ($mail==null || $password==null){
            throw new \Exception("Un ou plusieurs champs sont vide.");
        }
        // Vérifier l'adresse mail
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            throw new \Exception("L'adresse mail saisie n'est pas au bon format");
        }

        // Comparer les informations de connexions
        if ($repository->findOneBy(['email'=>"$mail"])==null || !password_verify($password,$repository->findOneBy(['email'=>"$mail"])->getPassword())){
            throw new \Exception("L'identifiant ou le mot de passe saisi est incorrect");
        }

        $_SESSION["utilisateur"]=[
            "mail" => $mail,
            "prenom" => $repository->findOneBy(["email"=>$mail])->getPrenom()
        ];
    }
}