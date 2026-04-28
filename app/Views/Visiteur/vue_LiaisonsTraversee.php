<?php echo form_open('horairestraversee');
echo csrf_field();
echo '<select name="liaisonstraversee">';
    foreach ($LesLiaisonsParSecteur as $UneLiaison) 
    {
      echo '<option value="b">' .$UneLiaison->portDepart. " - " .$UneLiaison->portArrivee. '</option>';
    }
echo '</select>';

echo '<input type="date" name="lesDatesDeDepart"/>';

echo form_submit('submit', 'Afficher les traversées');
    echo form_close();


if($lesDatesDeDepart == null | liaisonstraversee == null)
    {
        echo "La date ou la liaison n'on pas été selectionnées";
    }
    else
    {
        echo '<table>
        <tr>
            <th>Numero</th>
            <th>Heure</th>
            <th>Bateau</th>';
            foreach($LesCategories as $UneCategorie)
                echo '<th>' .$UneCategorie->LETTRECATEGORIE. '<br/>' .$UneCategorie->LIBELLE. '</th></tr>';
        foreach($LesTraversees as $UneTraversee)
        {
            echo "<tr><td>" .$UneTraversee->notraversee."</td><td>"
            .$UneTraversee->dateDepart."</td><td>"
            .$UneTraversee->nom."</td><tr/>";
        }
    }
    
    

    ?>

</body>
</html>