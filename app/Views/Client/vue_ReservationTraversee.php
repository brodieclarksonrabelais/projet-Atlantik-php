<html lang="en">
<head>
  <title>Tarfifs</title>
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
            else
            {
                echo'Vous devez vous connecter avant de réserver <br/>';
            }
            echo 'Saisissez les informations relatives à la réservation <br/>';
        ?>
    </div>
    <div>
        <form method="post">
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th>Type</th>
                    <th>Tarif en €</th>
                    <th>Quantité</th>
                </tr>
                </thead>
                    <?php foreach($LesTarifsParType as $TarifEtType)
                        {
                            $i = 0;
                            echo '<tr>';
                                echo "<td>";
                                    echo "<input type='hidden' name='LesTarifsParType[$i][notype]' value='" . $TarifEtType->notype . "' />";
                                    echo "<input type='hidden' name='LesTarifsParType[$i][lettrecategorie]' value='" . $TarifEtType->lettrecategorie  . "' />";
                                    echo "<input type='hidden' name='LesTarifsParType[$i][libelle]' value='" . $TarifEtType->LIBELLE . "' />";
                                    echo $TarifEtType->LIBELLE;
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='hidden' name='LesTarifsParType[$i][tarif]' value='" . $TarifEtType->tarif . "' />";
                                    echo $TarifEtType->tarif;
                                echo "</td>";
                                echo '<td>';
                                    echo '<input type="number" name="LesTarifsParType[$i][quantite]" size="10" pattern="[0-9]+"/>';
                                echo '</td>';
                            echo'</tr>';
                            $i++;
                            /*echo '<tr><td>' .$TarifEtType->LIBELLE. '</td>';
                            echo '<td>' .$TarifEtType->tarif. '</td>';
                            echo '<td><input type="number" name="quantite" size="10" pattern="[0-9]+"/></td>';
                            echo'</tr>'; */
                        }
                    ?>
                </tr>
        </table>
        <br/>
        <input type="submit" value="Valider panier" name="btnReservation">
        </form>
    </div>
</body>
</html>