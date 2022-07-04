<?php
/* Les vues sont des fichiers qui contiennent du
code HTML et des echo permettant d’afficher
les variables pré-remplies par le contrôleur */

//$tab_u est un objet ModelUtilisateur donné par le controllerUtilisateur


echo "<table border='1'>
<tr>
<th>email</th>
<th>login</th>
<th>password</th>
<th>is_recruteur(0:recruteur,1:candidat)</th>
 </tr>";
 foreach ($tab_u as $u)
   {
    echo "<tr>";
    echo "<td>".$u->getEmail()."</td> ";
    echo "<td>".$u->getLogin()."</td>";
    echo "<td>".$u->getPwd()."</td>";
    echo "<td>".$u->getTypeCompte()."</td>";
    echo "</tr>";

   }
   echo "</table>";


?>
<div class= 'add'>
	<a href='index.php?controller=recruteur&action=create'>connexion</a>
</div>

