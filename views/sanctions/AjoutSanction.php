<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Sanctions</title>
</head>
<body class="bg-body-secondary">
<h1>Ajouter une sanction</h1>

<?php if (!empty($erreurs)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($erreurs as $erreur): ?>
                <li><?= htmlspecialchars($erreur) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="">
    <div class="form-group">
        <label for="etudiant_id">Élève sanctionné</label>
        <select name="etudiant_id" id="etudiant_id" class="form-control" required>
            <option value="">-- Sélectionner un élève --</option>
            <?php foreach ($etudiants as $etudiant): ?>
                <option value="<?= $etudiant->getId() ?>">
                    <?= htmlspecialchars($etudiant->getNom()) ?> <?= htmlspecialchars($etudiant->getPrenom()) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="nom_demandeur">Nom du demandeur</label>
        <input type="text" name="nom_demandeur" id="nom_demandeur" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="motif">Motif</label>
        <select name="motif" id="motif" class="form-control" required>
            <option value="">-- Sélectionner un motif --</option>
            <?php foreach ($motifs as $motif): ?>
                <option value="<?= $motif->getId() ?>"><?= htmlspecialchars($motif->getLibelle()) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="date_incident">Date de l'incident</label>
        <input type="date" name="date_incident" id="date_incident" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Créer la sanction</button>
</form>
