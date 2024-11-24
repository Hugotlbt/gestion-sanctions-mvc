
<?php if (isset($error)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
<?php endif; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Créer un compte</h4>
                </div>
                <div class="card-body">
                    <form action="/?route=inscription" method="POST">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" id="nom" name="nom" class="form-control" placeholder="Entrez votre nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Entrez votre prénom" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail :</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="exemple@domaine.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Entrez un mot de passe sécurisé" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Confirmation du mot de passe :</label>
                            <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Confirmez votre mot de passe" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Créer un compte</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="/?route=login" class="text-decoration-none">Déjà un compte ? Connectez-vous</a>
                </div>
            </div>
        </div>
    </div>
</div>