<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="card bg-light text-white shadow" style="width:400px">
    <?php
        foreach ($LesSecteurs as $UnSecteur) 
        {
            echo '<tr><td>'.anchor('liaisonstraversee/' .$UnSecteur->nosecteur, $UnSecteur->nom).'</td></tr>';
        }
    ?>
    </div>
</body>
</html>