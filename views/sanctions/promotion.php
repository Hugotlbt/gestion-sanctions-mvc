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
    <h1 class="pt-5">Créer une promotion étudiante</h1>

    <?php if (isset($erreurs)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $erreurs; ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" class="mt-4">
        <div class="form-group form-control-lg">
            <label for="libelle">Nom de la promotion</label> <i class="bi bi-pencil-square"></i>
            <input type="text"
                   id="libelle"
                   name="libelle"
                   class="form-control mt-1" <?= (isset($erreurs["libelle"])) ? "border border-2 border-danger" : "" ?>
                   required maxlength="10"
                   placeholder="BTS-SIO2"
                   value=<?=(!empty($erreurs)) ? $_POST["libelle"] : "" ?>>
            <?php if (isset($erreurs["libelle"])): ?>
                <p class="form-text text-danger"><?= $erreurs["libelle"] ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group form-control-lg">
            <label for="date">Année de promotion</label> <i class="bi bi-calendar-plus"></i>
            <input type="number"
                   id="date"
                   name="date"
                   class="form-control mt-1" <?= (isset($erreurs["date"])) ? "border border-2 border-danger" : "" ?>
                   min="2000"
                   max="2150"
                   step="1"
                   value="2025"<?=(!empty($erreurs)) ? $_POST["date"] : "" ?>>
            <?php if (isset($erreurs["date"])): ?>
                <p class="form-text text-danger"><?= $erreurs["date"] ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 mt-5"> Créer la promotion <i class="bi bi-plus-circle "></i> </button>

    </form>

</div>

</body>
</html>