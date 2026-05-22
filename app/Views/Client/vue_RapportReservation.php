 <h2><u><strong><?php echo $TitreDeLaPage ?></strong></u></h2> 
    <div class="card bg-light shadow col-md-5">
        <h3>Traversée</h3><br/>
        <?php echo 'Liaison : ' .$UneLiaisonPourTraversee->portDepart. ' - ' .$UneLiaisonPourTraversee->portArrivee.'<br/>';
        echo 'Traversée n° : '.$LaTraversee->NOTRAVERSEE. ', départ le '.$LaTraversee->DATEHEUREDEPART.'<br/>';
        ?>
    </div>
    <div class="card bg-light shadow col-md-5">
        <h3>Vos Informations</h3><br/>
        <?php echo 'Nom : '.$InfosClient->NOM. ' , Prenom : '.$InfosClient->PRENOM.'<br/>';
            echo 'Adresse : '.$InfosClient->ADRESSE.'<br/>';
            echo 'CodePostal : '.$InfosClient->CODEPOSTAL. ' , Ville : '.$InfosClient->VILLE.'<br/>';
        ?>
    </div>
    <div class="card bg-light shadow col-md-5">
        <h3>Quantité reservé</h3><br/>
        <?php foreach($LesQuantitesReserves as $UneQuantiteReserve){
            echo $UneQuantiteReserve->LIBELLE. ' : ' .$UneQuantiteReserve->QUANTITERESERVEE. '<br/>';
        }
        ?>
    </div>
    <div class="card bg-light shadow col-md-5">
        <h3>Règlement</h3><br/>
        <?php echo 'Montant total à régler : ' .$MontantTotal. ' €<br/>';
        if($ModeReglement != null)
        {
            echo 'Modalités de règlement : ' .$ModeReglement. '<br/>';
        }
        else
        {
            echo 'Modalités de règlement : pas encore réglé<br/>';
        }
        ?>
    </div>