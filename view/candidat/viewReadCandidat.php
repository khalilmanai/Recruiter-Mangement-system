<?php

error_reporting(E_ALL ^ E_NOTICE);
	$IdCandidat=$u->getIdCandidat();
	echo '<p>id candidat : '.$IdCandidat;
	echo '<br/>Nom - Prenom : '.$u->getNomPrenom().' - Telephone  : '.$u->getTel().'Adresse :'.$u->getAdresse().'Niveau d etude : '.$u->getNiveauEtude().'Ecole : '$u->getEcole().'Nombre d experience : '.$u->getNbExp()'</p>';

?>