<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Promotion</title>
</head>
<body class="bg-body-secondary">

<div class="container mt-5" style="height: 60%">
    <h1 class="pt-5">Ajouter des élèves à partir d'un fichier CSV</h1>


    <form action="" method="POST" class="mt-4" enctype="multipart/form-data">
        <div class="form-group form-control-lg">
            <label for="formFile" class="form-label">Fichier CSV</label>
            <input class="form-control <?= isset($erreurs['formFile']) ? 'border border-2 border-danger' : '' ?>"
                   id="formFile"
                   name="formFile"
                   type="file"
                   accept=".csv"
                   >
            <?php if (isset($erreurs['formFile'])): ?>
                <p class="form-text text-danger"><?= $erreurs['formFile'] ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group form-control-lg">
            <label for="listePromotion" class="form-label">Liste des promotions</label>
            <select class="form-select <?= isset($erreurs['listePromotion']) ? 'border border-2 border-danger' : '' ?>"
                    name="listePromotion"
                    id="listePromotion"
                    >
                <option value="" selected>Choisir une promotion</option>



                <?php foreach ($promotions as $promotion): ?>
                    <option value="<?= $promotion->getId() ?>">
                        <?= htmlspecialchars($promotion->getLibelle() . ' - ' . $promotion->getAnnee(), ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($erreurs['listePromotion'])): ?>
                <p class="form-text text-danger"><?= $erreurs['listePromotion'] ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 mt-5">
            Importer les élèves <i class="bi bi-plus-circle"></i>
        </button>
    </form>

</div>

</body>
</html>