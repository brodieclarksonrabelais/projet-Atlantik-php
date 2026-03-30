<br><br><br>
<?php
if ($clientAjoute) { // true (1) si ajout, false (0) sinon
    echo 'Compte crée avec succès';
} else {
    echo 'Echec de la creation du compte.';
}
?>
<br><br><br>
<p><a href="<?php echo site_url('accueil') ?>">Retour à l'accueil</a></p>