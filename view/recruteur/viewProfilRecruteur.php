<?php 

error_reporting(E_ALL ^ E_NOTICE);
?>

<div class="container">
  <div class="containerBee">
  <h1>Bienvenue <?php echo $user->raison_social ?></h1>
    <h2>Informations </h2>
    <p>Télephone: <?php echo $user->tel ?></p>
    <p>Adresse: <?php echo $user->adresse ?></p>
    <p>Numéro Siret: <?php echo $user->num_siret ?></p>
    <p>Nombre employés: <?php echo $user->nb_employe ?></p>
    </br>
     <a href="index.php?controller=recruteur&action=update">Mette a jour votre profil</a>
  </div>
  <div class="containerBee">
  <h2>Mes offres d'emploi </h2>
    
    <p> Vous avez crée les offres suivantes: </p>
    
    <a href="index.php?controller=offreEmploi&action=create">Ajouter une nouvelle offre d'emploi</a>

    <?php 

         $output =' <div class="card-offre">';

   if($tab_u != null){

       
   foreach ($tab_u as $o) {

    $output .='  <div class="basic-card basic-card-light">
    <div class="card-content" style="background-color:#ffafcc;">
        <p class="card-text" style="color: #1d3557 ;">'.$o->description .'
        </p>
    </div>

    <div class="card-link" style="background-color:#ffc8dd;">
        <p>Date de Création'.$o->date_exp .'</p>
        <p>Date Expiration'.$o->date .'</p>
    </div>
    <div class="card-link">
    <a href="index.php?controller=offreEmploi&action=update&id_offre='.$o->id_offre .'" title="Modifier">Modifier | </span></a>
    <a href="index.php?controller=offreEmploi&action=delete&id_offre='.$o->id_offre .'" title="Supprimer">Supprimer | </span></a>
    <a href="index.php?controller=offreEmploi&action=read&id_offre='.$o->id_offre .'" title="Voir Plus">Voir Plus</span></a>
</div>
</div>';
}
}
$output .='</div>';

echo $output;



     ?>
  </div>
</div>
