<?php 


error_reporting(E_ALL ^ E_NOTICE);
echo "Bienvenue " . $_SESSION["raison_social"];


?>

<a href="index.php?controller=recruteur&action=update">mette a jour profil</a>