<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .feature-icon-small {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .feature-icon-small svg {
            width: 50%;
            height: 50%;
        }
    </style>
</head>
<body class="bg-body-secondary">
<div class="container mt-5 bg-body-secondary pt-1">
    <h1 class="mt-5 text-center">Logiciel de gestion de sanctions du lycée Gaudper</h1>
    <p class="text-center h4 mt-4">Bienvenue sur le logiciel de gestion des sanctions du lycée Gaudper.</p>
</div>

<div class="container px-4 py-5 mt-5 bg-light-subtle shadow p-3 mb-5 bg-body rounded">
    <h2 class="pb-2 border-bottom">Notre application</h2>

    <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
        <div class="col d-flex flex-column align-items-start gap-2">
            <h2 class="fw-bold text-body-emphasis">Gérez facilement les sanctions des élèves</h2>
            <p class="text-body-secondary">Créez un compte pour accéder à l'application et gérer efficacement vos tâches.</p>
            <a href="index.php?route=inscription" class="btn btn-primary btn-lg">Se connecter</a>
        </div>

        <div class="col">
            <div class="row row-cols-1 row-cols-sm-2 g-4">
                <div class="col d-flex flex-column gap-2 text-center">
                    <div class="feature-icon-small text-bg-primary bg-gradient rounded-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                            <path d="M4 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v.637a.5.5 0 0 1-.146.354L6.207 3H9.5a.5.5 0 0 1 .5.5V4h-7V3.5a.5.5 0 0 1 .5-.5h1.207L4.646 2.49a.5.5 0 0 1-.146-.354V1.5z"/>
                            <path d="M2 5h12V3.5a1.5 1.5 0 0 0-1.5-1.5h-2A1.5 1.5 0 0 0 9 3.5V5H2v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H10V3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V5h1v7.5A2.5 2.5 0 0 1 12.5 15h-9A2.5 2.5 0 0 1 1 12.5V5z"/>
                        </svg>
                    </div>
                    <h4 class="fw-semibold mb-0 text-body-emphasis">Gérez vos sanctions</h4>
                    <p class="text-body-secondary">Organisez et administrez toutes les sanctions efficacement.</p>
                </div>

                <div class="col d-flex flex-column gap-2 text-center">
                    <div class="feature-icon-small text-bg-primary bg-gradient rounded-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3.086l2.86 2.147a.5.5 0 0 1-.72.69l-3-2.25a.5.5 0 0 1-.14-.354V4.5A.5.5 0 0 1 8 4z"/>
                            <path d="M1.05 8a7 7 0 1 1 13.9 0A7 7 0 0 1 1.05 8zm13.287.372a6.02 6.02 0 0 0-.868-2.263l-5.44 5.44a6.02 6.02 0 0 0 2.264-.868L14.337 8.37zm-2.02 3.258a6.02 6.02 0 0 0 1.497-1.496l-1.9-1.9a6.02 6.02 0 0 0-1.497 1.496l1.9 1.9z"/>
                        </svg>
                    </div>
                    <h4 class="fw-semibold mb-0 text-body-emphasis">Efficace et rapide</h4>
                    <p class="text-body-secondary">Accédez rapidement à toutes vos données.</p>
                </div>

                <div class="col d-flex flex-column gap-2 text-center">
                    <div class="feature-icon-small text-bg-primary bg-gradient rounded-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-layout-sidebar" viewBox="0 0 16 16">
                            <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm15-1H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h13a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
                            <path d="M2.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5H1V3h1.5z"/>
                        </svg>
                    </div>
                    <h4 class="fw-semibold mb-0 text-body-emphasis">Interface intuitive</h4>
                    <p class="text-body-secondary">Une interface simple et claire pour tous.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>