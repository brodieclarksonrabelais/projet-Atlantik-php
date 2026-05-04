<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <form method="post">
        <table border=1>
            <tr>
                <th>Type</th>
                <th>Tarif en €</th>
                <th>Quantité</th>
            </tr>
                <?php foreach($LesTypes as $UnType)
                    {
                        echo '<tr><td>' .$UnType->libelle. '</td>';
                        
                        echo '<td><input type="text" name="quantite" size="10"/></td>';
                        echo'</tr>';
                    }
                ?>
            </tr>
    </table>
    <br/>
    <input type="submit" value="Valider panier">
    </form>
</body>
</html>