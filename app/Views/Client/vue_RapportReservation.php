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
        
    </div>