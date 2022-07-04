<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */
error_reporting(E_ALL ^ E_NOTICE);
$controller = "recruteur";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelRecruteur.php");
require_once ("{$ROOT}{$DS}model{$DS}ModelUser.php");
require_once ("{$ROOT}{$DS}model{$DS}ModelOffreEmploi.php"); 

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="create";	
	
switch ($action) {
    case "create":
        $pagetitle = "cree recruteur";
        $view = "create";
       	//$tab_u = ModelUtilisateur::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;
		
		case "created": // Action du formulaire de la création
			if(isset($_REQUEST['raison_social']) && isset($_REQUEST['tel']) && isset($_REQUEST['adresse'])
			&& isset($_REQUEST['num_siret']) && isset($_REQUEST['nb_employe']) && isset($_REQUEST['email']) 
			 && isset($_REQUEST['login']) && isset($_REQUEST['pwd'])  ){
				$raison_social = $_REQUEST["raison_social"];
				$tel = $_REQUEST["tel"];
				$adresse = $_REQUEST["adresse"];
				$num_siret = $_REQUEST["num_siret"];
				$nb_employe = $_REQUEST["nb_employe"];
				$email = $_REQUEST["email"];
				$login = $_REQUEST["login"];
				$pwd = $_REQUEST["pwd"];
				//il faut vérifier que l'utilisateur n'existe pas dans la bdd 
				//$recherche = ModelCandidat::select($ncin);
				//Si l'utilisateur n'existe pas donc on l'ajoute

				$u = new ModelUser(null, $email, $login, $pwd,null);	
					$tab = array(
					"id_user" => null,
					"email" => $email,
					"login" => $login,
					"pwd" => $pwd,
					"is_recruteur" => 1
					);	
					$id_user = $u->insert($tab);
					
					if($id_user!=null)
					{
					//il faut créer une object ModelUtilisateur pour accéder à insert car elle n'est pas static
					$r = new ModelRecruteur(null, $raison_social, $tel, $adresse, $num_siret, $nb_employe, $id_user);	
					$tab1 = array(
					"id_recruteur" => null,
					"raison_social" => $raison_social,
					"tel" => $tel,
					"adresse" => $adresse,
					"num_siret" => $num_siret,
					"nb_employe" => $nb_employe,
					"id_user" => $id_user
					);				
					$id = $r->insert($tab1);
					if (session_status() === PHP_SESSION_NONE) {
						session_start();
					}
					$_SESSION["raison_social"] = $raison_social;
					
					
					$pagetitle = "Utilisateur Enregistré";
					$view = "created";
					require ("{$ROOT}{$DS}view{$DS}view.php");
				}

				
					
				
			}
			break;
    
    
	
			case "readAll":
        $pagetitle = "Liste des Candidat";
        $view = "readAll";
       	$tab_u = ModelRecruteur::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
    break;
	
	case "update":
		if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
		$r = ModelRecruteur::select($_SESSION['id']);
		if($r !=null){
			$pagetitle = "Modifier Profil";
			$view = "update";
			require ("{$ROOT}{$DS}view{$DS}view.php");
		}		
	
	break;

	case "profil":
		$pagetitle = "Profil";
		$view = "profil";
		if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}

		$r= new ModelRecruteur();
		$user = $r->select($_SESSION["id"]);
	   	$_SESSION["user"] = $user;

	   	if(isset($_SESSION["id_user"])){
				$id_user = $_SESSION["id_user"];
				$offre = new ModelOffreEmploi();
				$id_recruteur = $offre->getIdRecruteur_($id_user);
				$tab_u = $offre->getAllOffre($id_recruteur->id_recruteur);//appel au modèle pour gerer la BD
		}

		require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
		break;
	
	case "updated": // Action du formulaire de modification
		if(isset($_REQUEST['raison_social']) && isset($_REQUEST['tel']) && isset($_REQUEST['adresse'])
		&& isset($_REQUEST['num_siret']) && isset($_REQUEST['nb_employe'])){
				$tab = array(
				"raison_social" => $_POST["raison_social"],
				"tel" => $_POST["tel"],
				"adresse" => $_POST["adresse"],
				"num_siret" => $_POST["num_siret"],
				"nb_employe" => $_POST["nb_employe"]);
				$o = new ModelRecruteur();
				if (session_status() === PHP_SESSION_NONE) {
					session_start();
				}
				$UpdatedProfil = $o->update($tab, $_SESSION["id"]);
				header('Location: index.php?controller=recruteur&action=profil');
			}
			break;
}
?>
