<?php

error_reporting(E_ALL ^ E_NOTICE);

 if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }

?>

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
    <div class="card-content" style="background-color:#ffafcc;">
        <p class="card-text" style="color: #1d3557 ;">'.$o->description .'
        </p>
    </div>

    <div class="card-link" style="background-color:#ffc8dd;"> 
        <atitle="Read Full"><span style="color: #1d3557 ;">Date de Création'.$o->date_exp .'</span></a>
        <atitle="Read Full"><span style="color: #1d3557 ;">Date Expiration'.$o->date .'</span></a>';
        if(isset($_SESSION["id"]) && $_SESSION["is_recruteur"] == 0)
        { 
          $output .='<form class ="formPostuler" style="background-color:#ffc8dd;" method="POST" action="index.php?controller=offreEmploi&action=postuler&id_offre='.$o->id_offre .'">
          <div class="fieldset-button">
            <button class="login-trigger" type="submit">Postuler </button>
          </div>
          </form>';

        }
    
        $output .=' </div>
</div>';
}
$output .='</div>';

echo $output;

    
  ?>
  </div>
  </div>
