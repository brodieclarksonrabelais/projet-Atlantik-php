<br><br><br>
<?php
if ($clientAModifier) { // true (1) si ajout, false (0) sinon
    echo 'Compte modifié avec succès';
} else {
    echo 'Echec de la modification du compte.';
}
?>
<br><br><br>
<p><a href="<?php echo site_url('accueil') ?>">Retour à l'accueil</a></p>