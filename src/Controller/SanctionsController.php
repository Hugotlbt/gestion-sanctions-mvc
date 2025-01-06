<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Motif;
use App\Entity\Promotion;
use App\UserStory\ConnectAccount;
use App\UserStory\CreateAccount;
use App\UserStory\CreatePromotion;
use App\UserStory\CreateSanction;
use App\UserStory\ImportCSV;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class SanctionsController extends AbstractController
{
    private array $sanctions = [];
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        session_start();
        $this->entityManager = $entityManager;
    }

    public function index(): void
    {
        $this->render('sanctions/index', [
            'sanctions' => $this->sanctions
        ]);
    }

    public function inscription(): void
    {
        if (isset($_SESSION['utilisateur'])) {
            $this->redirect('/');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmpassword'];

            try {
                // Tenter de créer un compte
                $user = new CreateAccount($this->entityManager);
                $user->execute($nom, $prenom, $email, $password, $confirmPassword);
                $this->redirect('/connexion');
            } catch (\Exception $e) {
                $erreurs = "";
                $erreurs = $e->getMessage();
            }

        }
        $this->render('Sanctions/inscription', ['erreurs' => $erreurs ?? null,]);
    }

    public function connexion(): void
    {
        if (isset($_SESSION['utilisateur'])) {
            $this->redirect('/');
        }
        if (isset($_SESSION['mail'])) {
            $this->redirect('/');;
            exit();
        } else {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $erreurs = "";
                try {
                    $user = new ConnectAccount($this->entityManager);
                    $user->execute($_POST["email"], $_POST["password"]);
                } catch (\Exception $e) {
                    $erreurs = $e->getMessage();
                }
                if ($erreurs == "") {
                    $this->redirect("/");
                    exit();
                }
            }
        }
        $this->render('Sanctions/connexion', ['erreurs' => $erreurs ?? null,]);
    }

    public function deconnexion(): void
    {
        if (isset($_SESSION['utilisateur'])) {
            session_destroy();
            session_start();
            $this->redirect('/');
        }
        $this->redirect('/');
    }

    public function pageErreur(): void
    {
        $this->render('Error/redirect');
    }

    public function promotion(): void
    {
        if (!isset($_SESSION['utilisateur'])) {
            $this->redirect('/redirect');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = strtoupper($_POST['libelle']);
            $date = $_POST['date'];
            try {
                // Tenter de créer un compte
                $promotion = new CreatePromotion($this->entityManager);
                $promotion->execute($libelle, $date);
                $this->redirect('/connexion');
            } catch (\Exception $e) {
                $erreurs = "";
                $erreurs = $e->getMessage();
            }

        }
        $this->render('Sanctions/promotion', ['erreurs' => $erreurs ?? null,]);
    }

    public function ajoutEleve(): void
    {
        if (!isset($_SESSION['utilisateur'])) {
            $this->redirect('/redirect');
        }

        $erreurs = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['formFile'])) {
            $file = $_FILES['formFile']['tmp_name'];
            $promotionId = $_POST['listePromotion'] ?? null;

            if (!$promotionId) {
                $erreurs['listePromotion'] = 'Veuillez sélectionner une promotion.';
            }

            if (file_exists($file)) {
                try {
                    $csv = \League\Csv\Reader::createFromPath($file, 'r');
                    $csv->setHeaderOffset(0); // Suppose que le fichier CSV a une ligne d'en-tête.

                    $records = $csv->getRecords(); // Itère sur les enregistrements CSV.
                    $promotion = $this->entityManager->getRepository(Promotion::class)->find($promotionId);

                    if (!$promotion) {
                        $erreurs['listePromotion'] = 'Promotion invalide.';
                    }

                    $count = 0;
                    foreach ($records as $record) {
                        $etudiant = new \App\Entity\Etudiant();
                        $etudiant->setPrenom($record['prenom']);
                        $etudiant->setNom($record['nom']);
                        $etudiant->setIdPromotion($promotion);

                        $this->entityManager->persist($etudiant);
                        $count++;
                    }

                    $this->entityManager->flush();
                    $_SESSION['success'] = "$count étudiants importés avec succès.";
                    $this->redirect('/');
                } catch (\Exception $e) {
                    $erreurs['formFile'] = 'Erreur lors de l’importation : ' . $e->getMessage();
                }
            } else {
                $erreurs['formFile'] = 'Le fichier est introuvable.';
            }
        }

        $promotions = $this->entityManager->getRepository(Promotion::class)->findAll();

        $this->render('Sanctions/ajoutEleve', [
            'promotions' => $promotions,
            'erreurs' => $erreurs ?? null,
        ]);


    }

    public function ajoutSanction(): void
    {
        $erreurs = [];

        // Vérification de la méthode HTTP
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération et validation des données du formulaire
            $eleveId = $_POST['eleve'] ?? null;
            $motifId = $_POST['motif'] ?? null;
            $descriptionMotif = $_POST['descriptionMotif'] ?? null;
            $dateIncident = $_POST['dateIncident'] ?? null;
            $demandeur = $_POST['demandeur'] ?? null;

            try {
                // Exécution de la création de sanction
                $sanctionService = new CreateSanction($this->entityManager);
                $sanctionService->execute(
                    $eleveId,
                    $motifId,
                    $descriptionMotif,
                    $dateIncident,
                    $demandeur,
                    'admin'
                );

                // Stockage du message de succès en session et redirection
                $_SESSION['success'] = 'La sanction a été créée avec succès.';
                $this->redirect('/');
            } catch (\Exception $e) {
                // Capture des erreurs et ajout au tableau
                $erreurs[] = $e->getMessage();
            }
        }

        // Récupération des données nécessaires à l'affichage
        $eleves = $this->entityManager->getRepository(Etudiant::class)->findAll();
        $motifs = $this->entityManager->getRepository(Motif::class)->findAll();

        // Affichage du formulaire avec les erreurs éventuelles
        $this->render('sanctions/ajoutSanction', [
            'erreurs' => $erreurs,
            'eleves' => $eleves,
            'motifs' => $motifs,
        ]);
    }

}
