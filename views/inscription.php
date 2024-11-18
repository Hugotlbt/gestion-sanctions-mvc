<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-body-secondary">
<div class="container mt-5">
    <h1>Inscription</h1>

    <?php if (isset($_SESSION['message'])): ?>
        <p class="alert alert-danger"><?php echo htmlspecialchars($_SESSION['message']); unset($_SESSION['message']); ?></p>
    <?php endif; ?>

    <form action="index.php?controller=Inscription&action=register" method="POST" class="mt-4">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" class="form-control" required maxlength="50">
        </div>

        <div class="form-group">
            <label for="prenom">Prenom:</label>
            <input type="prenom" id="prenom" name="prenom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="passwordConfirm">Confirmer le mot de passe:</label>
            <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control" required>
        </div>

        <input type="submit" value="S'inscrire" class="btn btn-primary mt-5">
    </form>

    <a href="index.php?controller=Login&action=index" class="btn btn-link mt-3">Déjà inscrit ? Connectez-vous</a>
</div>
</body>
</html>

