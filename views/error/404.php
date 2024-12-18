<?php
session_start()
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>404</title>
</head>
<body class="bg-body-secondary">

<div class="min-h-[400px] flex items-center justify-center">
    <div class="text-center">
        <div class="text-6xl font-bold text-gray-300 mb-4">404</div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Page non trouvée</h1>
        <p class="text-gray-600 mb-8">
            Désolé, la page que vous recherchez n'existe pas ou a été déplacée.
        </p>
        <div class="space-x-4">
            <a href="/" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>