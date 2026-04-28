<table>
    <tr>
        <th>Numero</th>
        <th>Heure</th>
        <th>Bateau</th>
        <?php 
        foreach($LesCategories as $UneCategorie)
            echo "<th>" .$UneCategorie->lettrecategorie. "<br/>" .$UneCategorie->libelle. "</th>"
        ?>
    </tr>
    <?php
    foreach($LesTraversees as $UneTraversee)
    {
        echo "<tr><td>" .$UneTraversee->notraversee."</td><td>"
        .$UneTraversee->notraversee."</td><td>"
        .$UneTraversee->dateDepart."</td><td>"
        .$UneTraversee->nom."</td><tr/>";
    }

?>

</body>
</html>