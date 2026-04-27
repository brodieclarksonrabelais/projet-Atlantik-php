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
            <div class="collapse navbar-collapse" id="mynavbar">
            <?php $session = session();
            if(!is_null($session->get('mel'))) : ?>
                <?php echo 'Utilisateur connecté : ' . $session->get('mel').'&nbsp;&nbsp;'; ?>
                <a href="<?php echo site_url('sedeconnecter') ?>">Se déconnecter</a>&nbsp;&nbsp;
                <a href="<?php echo site_url('modifieruncompte') ?>">Modifier les informations du compte</a>&nbsp;&nbsp;
                <a href="<?php echo site_url('reservationspourunclient') ?>">Vos reservations</a>&nbsp;&nbsp;
            <?php else : ?>
                <a href="<?php echo site_url('seconnecter') ?>">Se connecter</a>&nbsp;&nbsp;
            <?php endif; ?>
            <a href="<?php echo site_url('creeruncompte') ?>">Créer un compte</a>&nbsp;&nbsp;
            <a href="<?php echo site_url('liaisonparsecteur') ?>">Liaison par secteur</a>&nbsp;&nbsp;
            <a href="<?php echo site_url('secteurstraversee') ?>">Horaires des traversées</a>&nbsp;&nbsp;
            </div>
        </div>
    </nav>
</div>