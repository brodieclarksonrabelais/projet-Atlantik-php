<h2><?php echo $TitreDeLaPage ?></h2>
    <div class="card bg-light shadow col-md-5">
        <?php echo 'Liaison : ' .$UneLiaisonPourTraversee->portDepart. ' - ' .$UneLiaisonPourTraversee->portArrivee.'<br/>';
        echo 'Traversée n° : '.$LaTraversee->NOTRAVERSEE. ', départ le '.$LaTraversee->DATEHEUREDEPART.'<br/>';
        ?>
    </div>
    <div class="card bg-light shadow col-md-5">
        <?php echo 'Nom : '.$InfosClient->NOM. ' , Prenom : '.$InfosClient->PRENOM.'<br/>';
            echo 'Adresse : '.$InfosClient->ADRESSE.'<br/>';
            echo 'CodePostal : '.$InfosClient->CODEPOSTAL. ' , Ville : '.$InfosClient->VILLE.'<br/>';
        ?>
    </div>
    <div>
        <?php echo 'Montant total à régler : ' .$MontantTotal;
        ?>
    </div>