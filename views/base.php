
<!-- Navigation -->
<nav class="navbar navbar-expand-xxl navbar-dark bg-light-subtle static-top shadow-sm p-3 mb-5 bg-body rounded" style="height: 14%">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="logo-gaudper.png" alt="" height="125">
        </a>
        <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <?php if (!isset($_SESSION['utilisateur'])): ?>
                <li class="nav-item btn">
                    <a class="nav-link active text-black fw-bold" aria-current="page" href="/">Accueil</a>
                </li>
                <li class="nav-item btn btn-close-white">
                    <a class="nav-link text-black fw-bold" href="/inscription">Inscription</a>
                </li>
                <li class="nav-link active text-black fw-bold">
                    <a class="nav-link text-black fw-bold" href="/connexion">Connexion</a>
                </li>
                <?php else: ?>
                <li class="nav-item btn">
                    <a class="nav-link active text-black fw-bold" aria-current="page" href="/">Accueil</a>
                </li>
                <li class="nav-item btn btn-close-white">
                    <a class="nav-link text-black fw-bold" href="/ajout-eleves">Ajouter des élèves</a>
                </li>
                <li class="nav-item btn btn-close-white">
                    <a class="nav-link text-black fw-bold" href="/promotion">Promotion</a>
                </li>
                <li class="nav-item btn btn-close-white">
                    <a class="nav-link text-black fw-bold" href="/deconnexion">Deconnexion</a>
                </li>
                <li class="nav-item btn btn-close-white">
                    <p class="text-black fw-bold mt-2">
                        <?=  (isset($_SESSION["utilisateur"])) ? " ".$_SESSION["utilisateur"]["prenom"] : "" ?>
                        <i class="bi bi-person-circle h5"></i>
                    </p>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main class="">
    <?= $content ?>
</main>

<div class="bg-light border-bottom" style="height: 20%">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3" >
            <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Accueil</a></li>
            <li class="nav-item"><a href="/legal" class="nav-link px-2 text-body-secondary">Mentions legales</a></li>
        </ul>
        <p class="text-center text-body-secondary">© 2025 Lycée Gaudper - Tous droits réservés.</p>
    </footer>
</div>
