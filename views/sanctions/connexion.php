<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Connexion</title>
</head>
<body class="bg-body-secondary">

<div class="container mt-5 mb-5 pt-4" style="height: 61%">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-header bg-primary text-white text-center ">
                    <h4>Se connecter</h4>
                </div>
                <div class="card-body ">
                    <form action="" method="POST" novalidate>
                        <?php if (isset($erreurs)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $erreurs; ?>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Adresse mail:</label>
                            <input type="text"
                                   id="email"
                                   name="email"
                                   class="form-control <?= (isset($erreurs["email"])) ? "border border-2 border-danger" : "" ?>"
                                   placeholder="Entrez votre adresse mail"
                                   required>
                            <?php if (isset($erreurs["email"])): ?>
                                <p class="form-text text-danger"><?= $erreurs["email"] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3 fw-bold">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control <?= (isset($erreurs["password"])) ? "border border-2 border-danger" : "" ?>"
                                   placeholder="Entrez un mot de passe"
                                   required>
                            <?php if (isset($erreurs["email"])): ?>
                                <p class="form-text text-danger"><?= $erreurs["password"] ?></p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="/inscription" class="text-decoration-none">Vous n'avez pas de compte ? Inscrivez-vous</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>