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


<table class="table table-striped">
    <tr colspan = 3>
        <th rowspan=2 colspan=1>Catégorie</th>
        <th rowspan=2 colspan=1>Type</th>
        <th rowspan=1 colspan=4>
            Période
        </th>
    </tr>
    <tr>
        <?php
            foreach ($periode as $uneLigne) :
                echo '<th rowspan=1>'.$uneLigne->datedebut.'<br>'.$uneLigne->datefin.'</th>';
            endforeach 
        ?>
    </tr>

    <?php
        foreach ($categorie as $uneCategorie)
        {
            foreach($nombre as $unNombre)
            {
                if ($unNombre->LETTRECATEGORIE == $uneCategorie->LETTRECATEGORIE)
                {
                    echo '<tr>';
                        echo '<th rowspan='.$unNombre->NOMBRE.'>';
                        echo ''.$uneCategorie->LETTRECATEGORIE."</br>".$uneCategorie->LIBELLE.'';
                        echo '</th>';
                    foreach($type as $unType)
                    {
                        if ($unType->LETTRECATEGORIE == $uneCategorie->LETTRECATEGORIE)
                        {
                            if ($unType->NOTYPE != 1)
                                echo '<tr>';
                            
                            echo '<td>'.$unType->LETTRECATEGORIE."".$unType->NOTYPE." - ".$unType->LIBELLE.'</td>';
                            $numperiode = 1;
                            foreach($tarif as $unTarif)
                            {
                                if ($unTarif->NOPERIODE == $numperiode && $unTarif->LETTRECATEGORIE == $unType->LETTRECATEGORIE && $unTarif->NOTYPE == $unType->NOTYPE )
                                { 
                                    echo '<td>'.$unTarif->TARIF.'</td>';
                                    $numperiode++;
                                }
                            }      
                            echo '</tr>'; 
                        }                             
                    }                 
                }
            }
        }      
    ?>
</table>
