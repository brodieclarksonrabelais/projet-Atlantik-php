<select name = "LesLiaisons ">
  <?php
    foreach ($LesLiaisonsParSecteur as $UneLiaison) 
    {
      echo '<option value="b">' .$UneLiaison->portDepart. " - " .$UneLiaison->portArrivee. '</option>';
    }
  ?>
</select>

<div class="mt-4">
    <table class="table table-bordered text-center align-middle">
        <thead class="table-secondary">
            <tr>
                <th>N°</th>
                <th>Heure</th>
                <th>Bateau</th>
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