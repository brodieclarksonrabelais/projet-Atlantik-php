<h2><?php echo $TitreDeLaPage ?></h2>
<?php
  if ($TitreDeLaPage=='Saisie incorrecte')
    echo service('validation')->listErrors();
    /* set_value : en cas de non validation, les données déjà saisies sont réinjectées dans le formulaire */
    echo form_open('creeruncompte');
    echo csrf_field();
    
    echo form_label('Nom : ','txtNom');
    echo form_input('txtNom', set_value('txtNom')), '</br>', '</br>';

    echo form_label('Prenom : ','txtPrenom');
    echo form_input('txtPrenom', set_value('txtPrenom')), '</br>', '</br>';

    echo form_label('Adresse : ','txtAdresse');
    echo form_input('txtAdresse', set_value('txtAdresse')), '</br>', '</br>';

    echo form_label('Code Postal : ','txtCodepostal');
    echo form_input('txtCodepostal', set_value('txtCodepostal')), '</br>', '</br>';

    echo form_label('Ville : ','txtVille');
    echo form_input('txtVille', set_value('txtVille')), '</br>', '</br>';

    echo form_label('Telephone fixe : ','txtTelfixe');
    echo form_input('txtTelfixe', set_value('txtTelfixe')), '</br>', '</br>';

    echo form_label('Telephone portable : ','txtTelportable');
    echo form_input('txtTelportable', set_value('txtTelportable')), '</br>', '</br>';

    echo form_label('Adresse mel : ','txtMel');
    echo form_input('txtMel', set_value('txtMel')), '</br>', '</br>';
    
    echo form_label('Mot de passe : ','txtMotDePasse');
    echo form_input('txtMotDePasse : ', set_value('txtMotDePasse')), '</br>', '</br>';    
    
    echo form_submit('submit', 'Créer le compte');
    echo form_close();
?>