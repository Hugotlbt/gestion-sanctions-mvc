<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Inscription</title>
</head>
<body class="bg-body-secondary">



<?php if (isset($erreurs)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $erreurs; ?>
    </div>
<?php endif; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Créer un compte</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="mt-2">
                        <div class="mb-3">
                            <label for="nom " class="form-label fw-bold">Nom :</label>
                            <input type="text"
                                   id="nom"
                                   name="nom"
                                   class="form-control <?= (isset($erreurs["nom"])) ? "border border-2 border-danger" : "" ?>"
                                   placeholder="Entrez votre nom"
                                   value=<?=(!empty($erreurs)) ? $_POST["nom"] : "" ?>>
                            <?php if (isset($erreurs["nom"])): ?>
                                <p class="form-text text-danger"><?= $erreurs["nom"] ?></p>
                            <?php endif; ?>

                        </div>
                        <div class="mb-3 fw-bold">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text"
                                   id="prenom"
                                   name="prenom"
                                   class="form-control <?= (isset($erreurs["prenom"])) ? "border border-2 border-danger" : "" ?>"
                                   placeholder="Entrez votre prénom"
                                   value=<?=(!empty($erreurs)) ? $_POST["prenom"] : "" ?>>
                            <?php if (isset($erreurs["prenom"])): ?>
                                <p class="form-text text-danger"><?= $erreurs["prenom"] ?></p>
                            <?php endif; ?>

                        </div>
                        <div class="mb-3 fw-bold">
                            <label for="email" class="form-label">Adresse e-mail :</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   class="form-control <?= (isset($erreurs["email"])) ? "border border-2 border-danger" : "" ?>"
                                   placeholder="exemple@domaine.com"
                                   value=<?=(!empty($erreurs)) ? $_POST["email"] : "" ?>>
                            <?php if (isset($erreurs["email"])): ?>
                                <p class="form-text text-danger"><?= $erreurs["email"] ?></p>
                            <?php endif; ?>

                        </div>
                        <div class="mb-3 fw-bold">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <h5 class="fs-6 fw-light">Le mot de passe doit faire au moins 8 caractères, incluant une lettre majuscule et un chiffre.</h5>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control <?= (isset($erreurs["password"])) ? "border border-2 border-danger" : "" ?>"
                                   placeholder="Entrez un mot de passe"
                            <?php if (isset($erreurs["password"])): ?>
                                <div id="emailHelp" class="form-text text-danger"><?= $erreurs["password"] ?></div>
                            <?php endif; ?>

                        </div>
                        <div class="mb-3 fw-bold">
                            <label for="confirmpassword" class="form-label">Confirmation du mot de passe :</label>
                            <input type="password"
                                   id="confirmpassword"
                                   name="confirmpassword"
                                   class="form-control <?= (isset($erreurs["confirmpassword"])) ? "border border-2 border-danger" : "" ?>"
                                   placeholder="Confirmez votre mot de passe"

                            <?php if (isset($erreurs["confirmpassword"])): ?>
                                <p class="form-text text-danger"><?= $erreurs["confirmpassword"] ?></p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Créer un compte</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="/connexion" class="text-decoration-none">Déjà un compte ? Connectez-vous</a>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>