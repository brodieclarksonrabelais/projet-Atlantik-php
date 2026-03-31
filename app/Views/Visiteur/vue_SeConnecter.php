<h2><?php echo $TitreDeLaPage ?></h2>
<?php
  if ($TitreDeLaPage=='Saisie incorrecte')
    echo service('validation')->listErrors();
 
  /* set_value : en cas de non validation, les données déjà saisies sont réinjectées dans le formulaire */
  echo form_open('seconnecter');
  echo csrf_field();
 
  echo form_label('Adresse mel : ','txtMel');
  echo form_input('txtMel', set_value('txtMel')), '</br>', '</br>';    
 
  echo form_label('Mot de passe : ','txtMDPConnect');
  echo form_password('txtMDPConnect', set_value('txtMDPConnect')), '</br>', '</br>';    
 
  echo form_submit('submit', 'Se connecter');
  echo form_close();
?>