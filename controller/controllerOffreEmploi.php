<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */
error_reporting(E_ALL ^ E_NOTICE);
$controller = "offreEmploi";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelOffreEmploi.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelRecruteur.php");
require_once ("{$ROOT}{$DS}model{$DS}ModelCandidature.php");

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="create";	
	
switch ($action) {
    case "create":
        $pagetitle = "cree offre d'employe";
        $view = "create";
       	//$tab_u = ModelUtilisateur::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;

	case "read":	
		if(isset($_REQUEST['id_offre'])){
			$id_offre = $_REQUEST['id_offre'];
			$o = ModelOffreEmploi::select($id_offre);

				if($o!=null){
					$pagetitle = "Offre d'emploi";
					$view = "read";

					$candidature = ModelOffreEmploi::getCandidatOffre($id_offre);
					require ("{$ROOT}{$DS}view{$DS}view.php");
				}
			}	
		break;

		case "postuler":	
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}

			$u = new ModelCandidature($id_candidat=null, $id_offre=null, $date_candidature=null);
				
					$tab = array(
					"id_candidat" => $_SESSION["id"],
					"id_offre" => $_REQUEST['id_offre'],
					"date_exp" => date("Y-m-d")
					);	
					$id_offre = $u->insert($tab);
					$pagetitle = "Postuler Offre";
					$view = "postuler";
					require ("{$ROOT}{$DS}view{$DS}view.php");
		break;

		case "readAll":
			$pagetitle = "Liste des offres ";
			$view = "readAll";
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
			if(isset($_SESSION["id_user"])){
				$id_user = $_SESSION["id_user"];
				$offre = new ModelOffreEmploi();
				$id_recruteur = $offre->getIdRecruteur_($id_user);
				$tab_u = $offre->getAllOffre($id_recruteur->id_recruteur);//appel au modèle pour gerer la BD

				require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
			}
		break;

		case "All":
			$pagetitle = "Liste des offres ";
			$view = "All";
				$offre = new ModelOffreEmploi();
				$tab_u = $offre->getAllO();//appel au modèle pour gerer la BD
                 
				require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
			
		break;

		case "created": // Action du formulaire de la création
			if(isset($_REQUEST['date']) && isset($_REQUEST['date_exp']) && isset($_REQUEST['description'])){
				$date = $_REQUEST["date"];
				$date_exp = $_REQUEST["date_exp"];
				$description = $_REQUEST["description"];
				$id_recruteur = null;
				if (session_status() === PHP_SESSION_NONE) {
					session_start();
				}
				if (isset($_SESSION["id"])){
					$id_recruteur = $_SESSION["id"];
				}
				
				//il faut vérifier que l'utilisateur n'existe pas dans la bdd 
				//$recherche = ModelCandidat::select($ncin);
				//Si l'utilisateur n'existe pas donc on l'ajoute

				$u = new ModelOffreEmploi(null, $date, $date_exp, $description,$id_recruteur);	
					$tab = array(
					"id_offre" => null,
					"date" => $date,
					"date_exp" => $date_exp,
					"description" => $description,
					"id_recruteur" => $id_recruteur
					);	
					$id_offre = $u->insert($tab);
					$pagetitle = "Offre Ajouté";
					$view = "created";
					require ("{$ROOT}{$DS}view{$DS}view.php");
					header('Location: index.php?controller=recruteur&action=profil&message='.$pagetitle);
			}
			
			break;


			case "update":
				if(isset($_REQUEST['id_offre'])){
					$o = ModelOffreEmploi::select($_REQUEST['id_offre']);
					if($o!=null){
						$pagetitle = "Modifier l'offre";
						$view = "update";
						if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
						$_SESSION["id_offre"] = $_REQUEST['id_offre'] ;
						require ("{$ROOT}{$DS}view{$DS}view.php");
					
					}
				}
					break;
					
				case "updated": // Action du formulaire de modification
					if(isset($_REQUEST['date']) && isset($_REQUEST['date_exp']) && isset($_REQUEST['description'])){
					$tab = array(
					"date" => $_POST["date"],
					"date_exp" => $_POST["date_exp"],
					"description" => $_POST["description"]);
					$o = new ModelOffreEmploi();
					if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
					$UpdatedOffre = $o->update($tab, $_SESSION["id_offre"]);
					$pagetitle = "Offre modifiée avec succès";
					$view = "updated";
					header('Location: index.php?controller=recruteur&action=profil');
					}
					break;

		 case "delete":
        $pagetitle = "Supprimer l'offre";
        $view = "delete";
        if(isset($_REQUEST['id_offre'])){
	       	$offre = new ModelOffreEmploi();
			$offre->delete($_REQUEST['id_offre']);
			header('Location: index.php?controller=recruteur&action=profil');
		}

        break;
	
}
?>
