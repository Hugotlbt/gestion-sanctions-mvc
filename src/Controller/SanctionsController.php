<?php

namespace App\Controller;

use App\Entity\Promotion;
use App\UserStory\ConnectAccount;
use App\UserStory\CreateAccount;
use App\UserStory\CreatePromotion;
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

        $promotions = new ImportCSV ($this->entityManager);
        $promotions -> getPromotion();

        $this->render('Sanctions/ajoutEleve', ['promotions' => $promotions ?? null,]);
        }
}
