<?php

// Controller FRONTAL => Router
// Toutes les requetes des utilisateurs passent par ce ficher


$entityManager = require_once __DIR__ .'/../config/bootstrap.php';
// Chargement des variables d'environnement
$dotEnv=\Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotEnv->load(); //charger les variables d'environnement de .env dans un tableau $_ENV

// Configurer la connexion a la BDD

$db = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",$_ENV['DB_USER'],$_ENV['DB_PASSWORD']);

$route=$_GET['route'] ?? 'acceuil';

// test la valeur de $route
switch ($route){
    case 'acceuil':
        $accueilController = new \App\Controllers\AccueilController();
        $accueilController->accueil();
        break;
    case 'mention-legal':
        $mentionLegalController = new \App\Controllers\MentionLegalController();
        $mentionLegalController->mentionLegal();
        break;
    case 'inscription':
        $inscriptionController = new \App\Controllers\InscriptionController();
        $inscriptionController->inscription();
        break;

    default:
        // erreur 404
        echo "Page non trouvée";
        break;
}