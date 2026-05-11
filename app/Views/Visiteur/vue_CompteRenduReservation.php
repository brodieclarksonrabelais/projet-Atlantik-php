<html lang="en">
<head>
  <title>CompteRenduReservation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h2><?php echo $TitreDeLaPage ?></h2>
    <div class="card bg-light shadow col-md-5">
        <?php echo 'Liaison : ' .$UneLiaisonPourTraversee->portDepart. ' - ' .$UneLiaisonPourTraversee->portArrivee.'<br/>';
        echo 'Traversée n° : '.$LaTraversee->NOTRAVERSEE. ', départ le '.$LaTraversee->DATEHEUREDEPART.'<br/>';
        ?>
    </div>
    <div class="card bg-light shadow col-md-5">
        <?php if(isset($_SESSION['noclient']))
            {
                echo 'Nom : '.$InfosClient->NOM. ' , Prenom : '.$InfosClient->PRENOM.'<br/>';
                echo 'Adresse : '.$InfosClient->ADRESSE.'<br/>';
                echo 'CodePostal : '.$InfosClient->CODEPOSTAL. ' , Ville : '.$InfosClient->VILLE.'<br/>';
            }