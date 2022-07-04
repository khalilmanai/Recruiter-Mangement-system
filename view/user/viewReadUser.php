<?php
	$Iduser=$u->getIdUser();
	echo '<p>id recruteur : '.$Iduser;
	echo '<br/> login : '.$u->getLogin().' - password  : '.$u->getPwd().'type (0:recruteur,1:candidat) :'.$u->getTypeCompte().'email : '.$u->getEmail().'</p>';

?>