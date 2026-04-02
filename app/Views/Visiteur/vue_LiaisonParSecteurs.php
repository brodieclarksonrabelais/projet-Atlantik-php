 <?php echo '<h2>' .$TitreDeLaPage. '</h2>';
 /*<table border=2>
    <tr>
        <td colspan="2">Secteur</td>
        <td>Code Liaison</td>
        <td>Distance en milles marin</td>
        <td>Port de départ</td>
        <td>Port d’arrivée</td>
    </tr>
    <tr>
        <?php
        foreach($lesLiaisons as $uneLiaison):
            echo '<td colspan="2">'.$uneLiaison->nomsecteur.'</td>';
            echo '<td colspan="2">'.anchor('/'.$uneLiaison->noliaison).'</td>';
            echo '<td colspan="2">'.$uneLiaison->DISTANCE.'</td>';
            echo '<td colspan="2">'.$uneLiaison->portDepart.'</td>';
            echo '<td colspan="2">'.$uneLiaison->portArrivee.'</td>';
        endforeach;
        ?>
    </tr>
</table>*/

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
    .anchor('/'.$uneLiaison->noliaison)."</TD><TD>"
    .$uneLiaison->DISTANCE."</TD><TD>"
    .$uneLiaison->portDepart."</TD><TD>"
    .$uneLiaison->portArrivee."</TD>";
    echo "</TR>";
}
echo "</table>";
?>