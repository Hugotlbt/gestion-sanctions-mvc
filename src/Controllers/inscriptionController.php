<?php


namespace App\Controllers;
class InscriptionController
{
    // Méthode permettant de gerer la page d'acceuil
    public function inscription()
    {
        //Fait appelle au modele afin de recuperer les données dans la base

        //Fait appelle a la vu afin de renvoyer la page
        require_once __DIR__ . "/../../views/_partials/header.php";
        require_once __DIR__ . "/../../views/inscription.php";
        require_once __DIR__ . "/../../views/_partials/footer.php";

    }

}