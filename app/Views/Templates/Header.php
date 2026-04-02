<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Atlantik</title>
</head>
<body>
<div class="p-2 bg-primary text-white text-center">
  <h1>Atlantik</h1>
    <nav  class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)"> <a href="index.php"></a></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
            <form class="d-flex" action="lister_livre.php" method="get">
                <input class="form-control me-2" type="text" placeholder="Recherche dans le catalogue (saisie du nom de l'auteur)" name="navbar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
            <?php if(!is_null($session->get('mel'))) : ?>
                <?php echo 'Utilisateur connecté : ' . $session->get('prenom').'&nbsp;&nbsp;'; ?>
                <a href="<?php echo site_url('sedeconnecter') ?>">Se déconnecter</a>&nbsp;&nbsp;
                <a href="<?php echo site_url('modifieruncompte') ?>">Créer un compte</a>&nbsp;&nbsp;
            <?php else : ?>
                <a href="<?php echo site_url('seconnecter') ?>">Se connecter</a>&nbsp;&nbsp;
                <a href="<?php echo site_url('creeruncompte') ?>">Créer un compte</a>&nbsp;&nbsp;
                <a href="<?php echo site_url('liaisonparsecteur') ?>">Liaison par secteur</a>&nbsp;&nbsp;
            <?php endif; ?>
            </div>
        </div>
    </nav>
</div>