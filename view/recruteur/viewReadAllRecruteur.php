<?php

error_reporting(E_ALL ^ E_NOTICE);
/* Les vues sont des fichiers qui contiennent du
code HTML et des echo permettant d’afficher
les variables pré-remplies par le contrôleur */

//$tab_u est un objet ModelUtilisateur donné par le controllerUtilisateur


echo "<table border='1'>
<tr>
<th>raison social</th>
<th>Telephone</th>
<th>Adresse</th>
<th>num siret</th>
<th>nombre d employe</th>
 </tr>";
 foreach ($tab_u as $u)
   {
    echo "<tr>";
    echo "<td>".$u->getRaisonSocial()."</td> ";
    echo "<td>".$u->getTel()."</td>";
    echo "<td>".$u->getAdresse()."</td>";
    echo "<td>".$u->getNumSiret()."</td>";
    echo "<td>".$u->getNbEmploye()."</td>";
    echo "</tr>";

   }
   echo "</table>";


?>
<div class= 'add'>
	<a href='index.php?controller=recruteur&action=create'>Ajouter un nouvel recruteur</a>
</div>

