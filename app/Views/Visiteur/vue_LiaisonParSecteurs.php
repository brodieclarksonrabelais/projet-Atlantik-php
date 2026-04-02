 <?php echo '<h2>' .$TitreDeLaPage. '</h2>';

echo "<table class='table table-striped'>";
echo "
<tr>
    <th>Secteur</th>
    <th>Code Liaison</th>
    <th>Distance en milles marin</th>
    <th>Port de départ</th>
    <th>Port d’arrivée</th>
</tr>";
foreach ($lesLiaisons as $uneLiaison)
{
    echo "<TR>";
    echo "<TD>".$uneLiaison->nomsecteur."</TD><TD>"
    .anchor('tarifsparliaison/'.$uneLiaison->noliaison, $uneLiaison->noliaison)."</TD><TD>"
    .$uneLiaison->DISTANCE."</TD><TD>"
    .$uneLiaison->portDepart."</TD><TD>"
    .$uneLiaison->portArrivee."</TD>";
    echo "</TR>";
}
echo "</table>";

/*$attributsTableau = ["table_open" => "<table class='table table-striped'>",];
$table = new \CodeIgniter\View\Table($attributsTableau);
$table->setHeading(['Secteur', 'Code Liaison', 'Distance en milles marin', 'Port de départ', 'Port d’arrivée']); 
 
echo $table->generate($lesLiaisons);*/
?>