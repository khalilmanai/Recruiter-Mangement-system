<?php 

$user = $_SESSION["user"] ;


?>

<div class="container">
  <div class="containerBee">
    
     <?php echo "<h2> Bienvenue " . $user->raison_social . "</h2>"; ?>
    </br>
     <a href="index.php?controller=candidat&action=update">Mette a jour votre profil</a>
     <a href="index.php?controller=offreEmploi&action=readAll">Voir Vous Offres</a>

    </div>
</div>
