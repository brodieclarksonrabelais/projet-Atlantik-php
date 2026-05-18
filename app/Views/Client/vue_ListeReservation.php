    <?php echo "<h1>".$TitreDeLaPage."</h1>"?>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Numéro Réservation</th>
                <th>Date et Heure</th>
                <th>Montant Total</th>
                <th>Date et Heure de Départ</th>
                <th>Port de Départ</th>
                <th>Port d'Arrivée</th>
                <th>Payé</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($lesReservations as $UneReservation) {
                echo "<tr>";
                    echo "<td>".$UneReservation->NORESERVATION."</td><td>"
                    .$UneReservation->datereservation."</td><td>"
                    .$UneReservation->MONTANTTOTAL." €</td><td>"
                    .$UneReservation->DATEHEUREDEPART."</td><td>"
                    .$UneReservation->portdepart."</td><td>"
                    .$UneReservation->portarrivee."</td>";
                    if($UneReservation->PAYE) {
                        echo "<td class='text-success'>Oui</td>";
                    } else {
                        echo "<td class='text-danger'>Non</td>";
                    }
            }
            
            ?>
        </tbody>
    </table>
<?= $pager->links() ?>