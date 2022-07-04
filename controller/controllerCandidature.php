<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */

error_reporting(E_ALL ^ E_NOTICE);

$controller = "candidature";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelCandidature.php"); 

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="create";	
	
switch ($action) {
    case "create":
        $pagetitle = "cree candidature";
        $view = "create";
       	//$tab_u = ModelUtilisateur::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;
    case "readAll":
        $pagetitle = "Liste des candidat";
        $view = "readAll";
       	$tab_u = ModelCandidat::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;

		case "All":
			$pagetitle = "Liste des candidat";
			$view = "readAll";
			   $tab_u = ModelCandidature::getAll();//appel au modèle pour gerer la BD
			require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
			break;

	case "read":	
		if(isset($_REQUEST['ncin'])){
			$ncin = $_REQUEST['ncin'];
			$u = ModelUtilisateur::select($ncin);
				if($u!=null){
					$pagetitle = "Details de l'utilisateur";
					$view = "read";
					require ("{$ROOT}{$DS}view{$DS}view.php");
				}
			}	
		break;
		
	
}
?>
