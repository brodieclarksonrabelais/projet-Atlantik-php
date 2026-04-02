<?php echo '<h2>' .$TitreDeLaPage. '</h2>';

echo "<table class='table table-striped'>";
echo "
<tr>
    <th>Catégorie</th>
    <th>Type</th>
    <th>Période</th>
</tr>";
foreach ($lesTarifs as $unTarif)
{
    echo "<TR>";
    echo "<TD>".$unTarif->unecategorie."</TD><TD>"
    .$unTarif->nomcategorie."</TD><TD>"
    .$unTarif->lettretype."</TD><TD>"
    .$unTarif->numtype."</TD>"
    .$unTarif->nomtype."</TD>"
    .$unTarif->datedebut."</TD>"
    .$unTarif->datefin."</TD>"
    .$unTarif->tarif."</TD>";
    echo "</TR>";
}
echo "</table>";
?>