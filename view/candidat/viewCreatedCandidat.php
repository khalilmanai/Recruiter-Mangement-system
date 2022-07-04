<?php 

error_reporting(E_ALL ^ E_NOTICE);
?>

<div class="container">
  <div class="containerBee">
     <?php echo "<h2> Bienvenue " .  $_SESSION["nom_prenom"] . "</h2>"; ?>
    </br>
     <a href="index.php?controller=candidat&action=update">Mette a jour votre profil</a>
    </div>
</div>

s