 <?php echo '<h2>' .$TitreDeLaPage. '</h2>';

echo "<table class='table table-striped'>";
echo "
<tr>
    <th>N° de reservation</th>
    <th>Date réservation </th>
    <th>Départ</th>
    <th>Arrivée</th>
    <th>Date départ</th>
    <th>Total</th>
    <th>Payé</th>
</tr>";
foreach ($lesReservations as $uneReservation)
{
    echo "<TR>";
    echo "<TD>".$uneReservation->noreservation."</TD><TD>"
    .$uneReservation->datereservation."</TD><TD>"
    .$uneReservation->portDepart."</TD><TD>"
    .$uneReservation->portArrivee."</TD><TD>"
    .$uneReservation->datedebut."</TD><TD>"
    .$uneReservation->montanttotal."</TD><TD>"
    .$uneReservation->paye."</TD>";
    echo "</TR>";
}
echo "</table>";
 ?>
 
<?= $pager->links() ?>