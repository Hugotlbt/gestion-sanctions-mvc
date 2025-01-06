<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Créer une sanction</title>
</head>
<body class="bg-body-secondary">

<?php if (!empty($erreurs)): ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php foreach ($erreurs as $erreur): ?>
                <li><?= htmlspecialchars($erreur) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (isset($message)): ?>
    <div class="alert alert-success text-center" role="alert">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Créer une sanction</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="mt-2">
                        <div class="mb-3">
                            <label for="eleve" class="form-label fw-bold">Élève sanctionné :</label>
                            <select name="eleve" id="eleve" class="form-select <?= (isset($erreurs['eleve'])) ? "border border-2 border-danger" : "" ?>" required>
                                <option value="">-- Sélectionner un élève --</option>
                                <?php foreach ($eleves as $eleve): ?>
                                    <option value="<?= $eleve->getId() ?>"><?= htmlspecialchars($eleve->getNom() . ' ' . $eleve->getPrenom()) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($erreurs['eleve'])): ?>
                                <p class="form-text text-danger"><?= $erreurs['eleve'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="demandeur" class="form-label fw-bold">Nom du demandeur :</label>
                            <input type="text"
                                   id="demandeur"
                                   name="demandeur"
                                   class="form-control <?= (isset($erreurs['demandeur'])) ? "border border-2 border-danger" : "" ?>"
                                   placeholder="Entrez le nom du demandeur"
                                   value="<?= (!empty($erreurs)) ? htmlspecialchars($_POST['demandeur'] ?? '') : '' ?>"
                                   required>
                            <?php if (isset($erreurs['demandeur'])): ?>
                                <p class="form-text text-danger"><?= $erreurs['demandeur'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="motif" class="form-label fw-bold">Motif :</label>
                            <select name="motif" id="motif" class="form-select <?= (isset($erreurs['motif'])) ? "border border-2 border-danger" : "" ?>">
                                <option value="">-- Choisir un motif --</option>
                                <?php foreach ($motifs as $motif): ?>
                                    <option value="<?= $motif->getId() ?>"><?= htmlspecialchars($motif->getLibelle()) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($erreurs['motif'])): ?>
                                <p class="form-text text-danger"><?= $erreurs['motif'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="descriptionMotif" class="form-label fw-bold">Description du motif :</label>
                            <textarea name="descriptionMotif"
                                      id="descriptionMotif"
                                      class="form-control <?= (isset($erreurs['descriptionMotif'])) ? "border border-2 border-danger" : "" ?>"
                                      rows="4"><?= (!empty($erreurs)) ? htmlspecialchars($_POST['descriptionMotif'] ?? '') : '' ?></textarea>
                            <?php if (isset($erreurs['descriptionMotif'])): ?>
                                <p class="form-text text-danger"><?= $erreurs['descriptionMotif'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="dateIncident" class="form-label fw-bold">Date de l'incident :</label>
                            <input type="date"
                                   id="dateIncident"
                                   name="dateIncident"
                                   class="form-control <?= (isset($erreurs['dateIncident'])) ? "border border-2 border-danger" : "" ?>"
                                   value="<?= (!empty($erreurs)) ? htmlspecialchars($_POST['dateIncident'] ?? '') : '' ?>"
                                   required>
                            <?php if (isset($erreurs['dateIncident'])): ?>
                                <p class="form-text text-danger"><?= $erreurs['dateIncident'] ?></p>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Créer la sanction</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
