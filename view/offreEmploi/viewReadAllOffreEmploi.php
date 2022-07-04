
<?php 
error_reporting(E_ALL ^ E_NOTICE);?>
<div class="container">
  <div class="containerBee">
  <?php
  
/* Les vues sont des fichiers qui contiennent du
code HTML et des echo permettant d’afficher
les variables pré-remplies par le contrôleur */

//$tab_u est un objet ModelUtilisateur donné par le controllerUtilisateur

   $output =' <div class="card-offre">';
   foreach ($tab_u as $o) {

    $output .='  <div class="basic-card basic-card-light">
    <div class="card-content">
        <p class="card-text">'.$o->description .'
        </p>
    </div>

    <div class="card-link">
        <p>Date de Création'.$o->date .'</p>
        <p>Date Expiration'.$o->date_exp .'</p>
    </div>
    <div class="card-link">
    <a href="index.php?controller=offreEmploi&action=update&id_offre='.$o->id_offre .'" title="Read Full">Modifier Offre</span></a>
    <a href="index.php?controller=offreEmploi&action=delete&id_offre='.$o->id_offre .'" title="Read Full">Supprimer Offre</span></a>
    <a href="index.php?controller=offreEmploi&action=postuler&id_offre='.$o->id_offre .'" title="Read Full">voir plus </span></a>
</div>
</div>';
}
$output .='</div>';

echo $output;
?>
<div class= 'add'>
	<a href='index.php?controller=offreEmploi&action=create'>Ajouter une nouvelle offre</a>
</div>

  </div>
  </div>
