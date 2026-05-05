<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div>
        <?php //echo 'Liaison : ' .$LiaisonPourTraversee->  .'<br/>';
        echo 'Traversée n° : '.$LaTraversee->notraversee. ' le '.$LaTraversee->dateheuredepart.'<br/>';
        echo 'Saisir les informations relatives à la réservation';
        ?>
    </div>
    <div>
        <?php if(isset($noclient))
            {
                echo 'Nom : '.$InfosClient->nom. ' Prenom : '.$InfosClient->prenom.'<br/>';
                echo 'Adresse : '.$InfosClient->adresse.'<br/>';
                echo 'CodePostal : '.$InfosClient->codepostal. ' Ville : '.$InfosClient->ville.'<br/>';
            }
            else
            {
                echo'Vous devez vous connecter avant de réserver';
            }
        ?>
    </div>
    <div>
        
    </div>
</body>
</html>