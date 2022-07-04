<?php 

error_reporting(E_ALL ^ E_NOTICE);?>

<section class="full-width-img">
		<h1 class="titreBee" style="color: #1d3557 ;">Bienvenue dans le site numéro 1 de mise en relation entre l'offreur d'emploi et le demandeur.</h1>
</section>

<section style="text-align: center;">
<h2 style="margin-top: -85px; color: #1d3557 ; ">Nos Derniers Offre d'emploi </h2>
<div class="container">
  <div class="containerBeeA">
  <?php
  require_once ("{$ROOT}{$DS}model{$DS}ModelOffreEmploi.php"); 
  $offre = new ModelOffreEmploi();
  $tab_u = $offre->getAllO();
    $i = 0;
   $output =' <div class="card-offre">';
   foreach ($tab_u as $o) {
    if($i < 3) {
    $output .='  <div class="basic-card basic-card-light">
    <div class="card-content" style="background-color:#ffafcc;">
        <p class="card-text" style="color: #1d3557 ;">'.$o->description .'
        </p>
    </div>

    <div class="card-link" style="color: #1d3557 ;  background-color:#ffc8dd;"">
        <a  title="Read Full"><span style="color: #1d3557 ;">Date de Création'.$o->date_exp .'</span></a><br>
        <a  title="Read Full"><span style="color: #1d3557 ;">Date Expiration'.$o->date .'</span></a>
        <form class ="formPostuler" style="background-color:#ffc8dd; "  method="POST" action="index.php?controller=offreEmploi&action=postuler&id_offre='.$o->id_offre .'">
        </form>
    </div>
</div>';
}
$i ++;
}
$output .='</div>';

echo $output;
?>

  </div>
  </div>


</section>

