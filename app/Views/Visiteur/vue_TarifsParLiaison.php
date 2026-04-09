<?php echo '<h2>' .$TitreDeLaPage. '</h2>';

/*echo "<table class='table table-striped'>";
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
echo "</table>";*/
?>

<center>
<h4><?=  $TitreDeLaPage. ' - ' . $nomsports[0]->portDepart . ' -> ' . $nomsports[0]->portArrivee ?> </h4>
</center>
<div class="mt-4">
    <table class="table table-bordered text-center align-middle">
        <thead class="table-secondary">
            <tr>
                <th>Catégorie</th>
                <th>Type</th>
                <th colspan="<?= count($periodes) ?>">Périodes</th>
            </tr>
            <tr>
                 <th colspan="2"></th>
                 <?php
                    foreach ($periodes as $unePeriode) : ?>
                        <th><?= $unePeriode->DATEDEBUT. '</br>' . $unePeriode->DATEFIN ?></th>
                    <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $cat) {
                foreach ($types as $type) {
                          if ($type->LETTRECATEGORIE !== $cat->LETTRECATEGORIE) continue; 
                                echo '<tr>';
                                echo' <td>' . $cat->LETTRECATEGORIE . ' - ' . $cat->libelle. '</td>';
                                echo '<td>' . $cat->LETTRECATEGORIE . $type->NOTYPE . ' - ' . $type->libelle . '</td>';
                                foreach($tarifs as $unTarif)
                                {
                                    if ($unTarif->LETTRECATEGORIE === $cat->LETTRECATEGORIE && $unTarif->NOTYPE === $type->NOTYPE) 
                                        {
                                            foreach ($periodes as $unePeriode) {
                                            if ($unePeriode->NOPERIODE == $unTarif->NOPERIODE) {
                                                echo '<td>' . $unTarif->TARIF . ' €</td>';
                                            }
                                        }
                                    }
                                }                            
                    echo '</tr>';
                }
            } 
            ?>
        </tbody>
    </table>
</div>


?>