<?php echo '<h2>' .$TitreDeLaPage. '</h2>';

echo "<table class='table table-striped'>";
echo "
<tr>
    <th>noliaison</th>
    <th>lettre catégorie</th>
    <th>libelle categorie</th>
    <th>lettre type</th>
    <th>notype</th>
    <th>libelle type</th>
    <th>datedebut</th>
    <th>datefin</th>
    <th>tarif</th>
</tr>";
foreach ($lesTarifs as $unTarif)
{
    echo "<TR>";
    echo "<TD>".$unTarif->numliaison."</TD><TD>"
    .$unTarif->unecategorie."</TD><TD>"
    .$unTarif->nomcategorie."</TD><TD>"
    .$unTarif->lettretype."</TD><TD>"
    .$unTarif->numtype."</TD><TD>"
    .$unTarif->nomtype."</TD><TD>"
    .$unTarif->datedebut."</TD><TD>"
    .$unTarif->datefin."</TD><TD>"
    .$unTarif->tarif."</TD>";
    echo "</TR>";
}
echo "</table>";
?>