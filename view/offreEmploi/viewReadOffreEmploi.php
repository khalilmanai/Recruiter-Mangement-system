<?php

error_reporting(E_ALL ^ E_NOTICE);
	require_once ("{$ROOT}{$DS}model{$DS}ModelCandidat.php"); 
	$u = new ModelCandidat();
?>

<div class="container">
  <div class="containerBee">
  <h1>Decription de l'offre</h1>
    <p><?php echo $o->description ?></p>
    <p>Date de Création: <?php echo $o->date ?></p>
    <p>Date Expiration: <?php echo $o->date_exp ?></p>
   </div>

   <div class="containerBee">
   		<?php $output ='<h1>Les candidats</h1>'; ?>

   		<?php 
       if($candidature != null){
          foreach ($candidature as $c) {

          $candidat = $u->select($c->id_candidat);
          $output .='<p>Nom & Prénom: '.$candidat->nom_prenom.'</p>';
          $output .='<p>Adresse: '.$candidat->adresse.'</p>';
          $output .='<p>Tel: '.$candidat->tel.' | Ecole: '.$candidat->ecole.' | Niveau Etude: '.$candidat->niveau_etude.' | Année Expérience: '.$candidat->nb_exp.'</p>';
          $output .='<div class="border_b"></div>';
              }
              echo $output;
        }
   			
   		?>
   </div>
 </div>