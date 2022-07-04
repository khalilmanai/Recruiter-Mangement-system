<?php
  
error_reporting(E_ALL ^ E_NOTICE);
/* Les vues sont des fichiers qui contiennent du
code HTML et des echo permettant d’afficher
les variables pré-remplies par le contrôleur */

//$tab_u est un objet ModelUtilisateur donné par le controllerUtilisateur

   $output =' <div class="card-offre">';
   foreach ($tab_u as $o) {

    $output .='  <div class="basic-card basic-card-light">
    <div class="card-content">
        <p class="card-text">'.$o->nom_prenom.'
        </p>
        <p>Date de Création'.$o->tel.'</p>
    </div>

    <div class="card-link">
        <p>Date de Création'.$o->adresse.'</p>
        <p>Date Expiration'.$o->niveau_etude.'</p>
    </div>
	<div class="card-link">
        <p>Date de Création'.$o->ecole.'</p>
        <p>Date Expiration'.$o->nb_exp.'</p>
    </div>

    <div class="card-link">
    <a href="index.php?controller=candidat&action=update&id_candidat='.$o->id_candidat.'" title="Read Full">Modifier Offre</span></a>
    <a href="index.php?controller=candidat&action=delete&id_candidat='.$o->id_candidat.'" title="Read Full">Supprimer Offre</span></a>
    <a href="index.php?controller=candidat&action=postuler&id_candidat='.$o->id_candidat.'" title="Read Full">voir plus </span></a>
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
     