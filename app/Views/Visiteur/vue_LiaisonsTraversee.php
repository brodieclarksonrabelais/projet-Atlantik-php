<?php echo form_open('affichertraversee');
echo csrf_field();
echo '<select name = "affichertraversee">';
    foreach ($LesLiaisonsParSecteur as $UneLiaison) 
    {
      echo '<option value="b">' .$UneLiaison->portDepart. " - " .$UneLiaison->portArrivee. '</option>';
    }
echo '</select>';

echo '<input type="date" name = "LesDatesDeDepart"/>';

echo form_submit('submit', 'Afficher les traversées');
    echo form_close();
?>