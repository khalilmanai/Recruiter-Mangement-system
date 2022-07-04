<?php 

error_reporting(E_ALL ^ E_NOTICE);
 
require_once ("{$ROOT}{$DS}model{$DS}ModelOffreEmploi.php"); 

$r= new ModelOffreEmploi();


?>

<div class="container">
  <div class="containerBee">
    <h1>Bienvenue <?php echo $user->nom_prenom ?></h1>
    <h2>Informations </h2>
    <p>Télephone: <?php echo $user->tel ?></p>
    <p>Adresse: <?php echo $user->adresse ?></p>
    <p>Nivezu d'étude: <?php echo $user->niveau_etude ?></p>
    <p>Ecole: <?php echo $user->ecole ?></p>
    <p>Nombre d'années d'expérience: <?php echo $user->nb_exp ?></p>
    </br>
     <a href="index.php?controller=candidat&action=update">Mette a jour votre profil</a>
  </div>
  <div class="containerBee">
    <h2>Mes Candidatures </h2>
    <p>Vous avez postulé pour les offres suivantes:</p>

  <?php 
    
  $output =' <div class="card-offre">';
  foreach ($offres as $offre) {

    $o = $r->select($offre->id_offre);

    $output .=' <div class="basic-card basic-card-light">
    <div class="card-content" style="background-color:#ffafcc;">
        <p class="card-text" >'.$o->description .'
        </p>
    </div>

    <div class="card-link" style="background-color:#ffc8dd;">
        <a href="#" title="Read Full"><span>Date de Création'.$o->date_exp .'</span></a><br>
        <a href="#" title="Read Full"><span>Date Expiration'.$o->date .'</span></a>';
    $output .=' </div> </div>';
    }
    
    echo $output;

  ?>
    </div>
  </div>
</div>
