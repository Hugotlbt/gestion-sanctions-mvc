<?php


namespace App\Controllers;
class AccueilController
{
    // Méthode permettant de gerer la page d'acceuil
    public function accueil()
    {
        //Fait appelle au modele afin de recuperer les données dans la base

        //Fait appelle a la vu afin de renvoyer la page
        require_once __DIR__ . "/../../views/_partials/header.php";
        require_once __DIR__ . "/../../views/acceuil/acceuil.php";
        require_once __DIR__ . "/../../views/_partials/footer.php";

    }

}