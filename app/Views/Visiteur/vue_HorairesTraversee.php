        <div class="card bg-light text-white shadow col-md-10">
            <form method="post">
                <h3>Sélectionner la liaison et la date souhaitée</h3>
                <select name = "liaisons">
                    <?php
                        if (isset($LesLiaisonsParSecteur))
                        {
                            foreach($LesLiaisonsParSecteur as $UneLiaison)
                            {
                                echo "<option value='" . $UneLiaison->noliaison . "'>" . $UneLiaison->portDepart . " -> " . $UneLiaison->portArrivee . "</option>";
                            }
                        }
                        else
                        {
                            echo "<option>Aucune liaison disponible</option>";
                        }
                    ?>
                </select>
                <input type="date" name="datedepart"><br/><br/>
                <input type="submit" name="affichertraversees" value="Afficher les traversées">
            </form>
        </div>

    
    
    <?php
    if(!isset($_POST['affichertraversees']))
        {
            echo "Séléctionnez une date et une liaison";
        }
        else
        {
            echo '<div>
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th>Numero</th>
                    <th>Heure</th>
                    <th>Bateau</th>';
                    foreach($LesCategories as $UneCategorie)
                        {
                            echo '<th>' .$UneCategorie->LETTRECATEGORIE. '<br/>' .$UneCategorie->LIBELLE. '</th>';
                        }
                echo '</tr></thead>';
                    
                if($_POST['liaisons'] == null ||  $_POST['datedepart'] == null)
                        {
                            echo "La date ou la liaison n'a pas été séléctionné";
                        }
                        else
                        {    
                            foreach($LesTraversees as $UneTraversee)
                            {
                                if($_POST['liaisons'] == $UneTraversee->noliaison &&  $_POST['datedepart'] == $UneTraversee->dateDepart)
                                {
                                    echo "<tr><td>" .anchor('reservationtraversee/'.$UneTraversee->notraversee ,$UneTraversee->notraversee)."</td><td>"
                                    .$UneTraversee->heureDepart."</td><td>"
                                    .$UneTraversee->nom."</td><tr/>";
                                }
                            }
                        }
                echo '</table><div>';
        }
        ?>
    </div>
</body>
</html>