<?php

namespace App\Controllers;

use App\UserStory\CreateAccount;

class InscriptionController
{
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function inscription()
    {
        //Fait appelle a la vu afin de renvoyer la page
        require_once __DIR__ . "/../../views/_partials/header.php";

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            require_once __DIR__ . '/../../views/inscription/inscription.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = $_POST['nom'] ?? null;
            $prenom = $_POST['prenom'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $passwordConfirm = $_POST['password_confirm'] ?? null;

            try {
                if ($password !== $passwordConfirm) {
                    throw new \Exception("Les mots de passe ne correspondent pas.");
                }

                $createAccount = new CreateAccount($this->entityManager);
                $createAccount->execute($prenom, $nom, $email, $password);

                // Redirection en cas de succès en attendant la connexion scrum 2
                header('Location: /index');
                exit;
            } catch (\Exception $e) {
                $error = $e->getMessage();
                require_once __DIR__ . '/../../views/inscription/inscription.php';
            }
        }
    }
}