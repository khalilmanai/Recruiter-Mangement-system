<?php

error_reporting(E_ALL ^ E_NOTICE);
	$Idrecruteur=$u->getIdRecruteur();
	echo '<p>id recruteur : '.$Idrecruteur;
	echo '<br/> Raison Social: '.$u->getRaisonSocial().' - Telephone  : '.$u->getTel().'Adresse :'.$u->getAdresse().'Num Siret : '.$u->getNumSiret().'Nb Employe : '$u->getNbEmploye().'</p>';

?>