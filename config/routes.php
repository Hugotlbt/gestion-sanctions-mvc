<?php
return [
    '/' => ['AccueilController', 'index'],
    '/sanctions' => ['SanctionsController', 'index'],
    '/inscription' => ['SanctionsController', 'inscription'],
    '/connexion' => ['SanctionsController', 'connexion'],
    '/legal' => ['AccueilController', 'legal'],
    '/deconnexion' => ['SanctionsController', 'deconnexion'],
    '/promotion' => ['SanctionsController', 'promotion'],
    '/redirect' => ['SanctionsController', 'pageErreur'],
    '/ajout-eleves'  => ['SanctionsController', 'ajoutEleve'],
    '/ajout-sanction' => ['SanctionsController', 'ajoutSanction']

];