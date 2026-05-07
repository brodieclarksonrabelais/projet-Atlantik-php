<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="card bg-light shadow col-md-5">
        <?php //echo 'Liaison : ' .$LiaisonPourTraversee->  .'<br/>';
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
            else
            {
                echo'Vous devez vous connecter avant de réserver <br/>';
            }
                echo 'Saisissez les informations relatives à la réservation <br/>';
        ?>
    </div>
    <div>
        <form method="post">
            <table border=1>
                <tr>
                    <th>Type</th>
                    <th>Tarif en €</th>
                    <th>Quantité</th>
                </tr>
                    <?php foreach($LesTarifsParType as $TarifEtType)
                        {
                            echo '<tr><td>' .$TarifEtType->LIBELLE. '</td>';
                            echo '<td>' .$TarifEtType->tarif. '</td>';
                            echo '<td><input type="text" name="quantite" size="10"/></td>';
                            echo'</tr>';
                        }
                    ?>
                </tr>
        </table>
        <br/>
        <input type="submit" value="Valider panier">
        </form>
    </div>
</body>
</html>