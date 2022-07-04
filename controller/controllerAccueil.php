<?php

error_reporting(E_ALL ^ E_NOTICE);
$controller = "accueil";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
switch ($action) {

	case "readAll" :
        $view = "readAll";
        require ("{$ROOT}{$DS}view{$DS}view.php");
    break;
    case "erreur" :
        $view = "erreur";
        require ("{$ROOT}{$DS}view{$DS}view.php");
    break;
}
