<div class="card bg-light text-white shadow col-md-10">
    <?php 
        if(!isset($_POST['btnEnvoyer'])) 
        {
            echo '
            <form action="" method="post">
            <select name = "affichertraversee">';
            foreach ($LesLiaisonsParSecteur as $UneLiaison) 
            {
                echo '<option value="b">' .$UneLiaison->portDepart. " - " .$UneLiaison->portArrivee. '</option>';
            }
            echo '</select>';
             echo '<input type="date" name = "LesDatesDeDepart"/><br/><br/>';
            echo '<input type="submit" name="btnEnvoyer" value="Afficher les traversées"></form>';
        }
        else 
        {    
            ?>
            <table>
                <tr>
                    <th>Numero</th>
                    <th>Heure</th>
                    <th>Bateau</th>
                    <?php foreach($LesCategories as $UneCategorie)
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
            echo'</table>';
        }
    ?>
</div>
<!--<table>
    <tr>
        <th>Numero</th>
        <th>Heure</th>
        <th>Bateau</th>
        <?php 
        /*foreach($LesCategories as $UneCategorie)
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
*/
?>
-->
</body>
</html>