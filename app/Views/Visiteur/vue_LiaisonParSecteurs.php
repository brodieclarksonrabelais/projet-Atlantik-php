 <h2><?php echo $TitreDeLaPage ?></h2>
 <table border=2>
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
</table>