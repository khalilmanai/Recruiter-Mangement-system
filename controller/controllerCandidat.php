<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */

error_reporting(E_ALL ^ E_NOTICE);
$controller = "candidat";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelCandidat.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelUser.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelCandidature.php"); 

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="create";	
	
switch ($action) {

    case "create":
        $pagetitle = "cree candidat";
        $view = "create";
       	//$tab_u = ModelCandidat::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;
	
	case "profil":
			$pagetitle = "Profil";
			$view = "profil";
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
  			$r= new ModelCandidat();
  			$user = $r->select($_SESSION["id"]);
  			$offre= new ModelCandidature();
  			$offres = $offre->getCandidature($_SESSION["id"]);
  			$_SESSION["user"] = $user;
			require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
			break;

	
	case "created": // Action du formulaire de la création
			if(isset($_REQUEST['nom_prenom']) && isset($_REQUEST['tel']) && isset($_REQUEST['adresse'])
			&& isset($_REQUEST['niveau_etude']) && isset($_REQUEST['ecole'])  && isset($_REQUEST['nb_exp']) && isset($_REQUEST['email']) 
			&& isset($_REQUEST['login']) && isset($_REQUEST['pwd'])  ){
				$nom_prenom = $_REQUEST["nom_prenom"];
				$tel = $_REQUEST["tel"];
				$adresse = $_REQUEST["adresse"];
				$niveau_etude = $_REQUEST["niveau_etude"];
				$ecole = $_REQUEST["ecole"];
				$nb_exp = $_REQUEST["nb_exp"];
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
					"pwd" => hash('sha256', $pwd),
					"is_recruteur" => 0
					);	
					$id_user = $u->insert($tab);
					
					if($id_user!=null)
					{
							//il faut créer une object ModelUtilisateur pour accéder à insert car elle n'est pas static
					$u = new ModelCandidat(null, $nom_prenom, $tel, $adresse, $niveau_etude, $ecole, $nb_exp, $id_user);	
					$tab = array(
					"id_candidat" => null,
					"nom_prenom" => $nom_prenom,
					"tel" => $tel,
					"adresse" => $adresse,
					"niveau_etude" => $niveau_etude,
					"ecole" => $ecole,
					"nb_exp" => $nb_exp,
					"id_user" => $id_user
					);				
					$id=$u->insert($tab);
					if (session_status() === PHP_SESSION_NONE) {
						session_start();
					}
					$_SESSION["nom_prenom"] = $nom_prenom;
					$_SESSION["id"] = $id ;
					$pagetitle = "Utilisateur Enregistré";
					$view = "created";
					require ("{$ROOT}{$DS}view{$DS}view.php");
					}

			}
	break;
    
    
	
			case "readAll":
        $pagetitle = "Liste des Candidat";
        $view = "readAll";
       	$tab_u = ModelCandidat::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
    break;

	case "read":

		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
		$id_candidat = $_SESSION["id"];	
		if(isset($_REQUEST['login']) && isset($_REQUEST['pwd'])){
			if($c==1)
			{
			$login = $_REQUEST['login'];
			$u = ModelCandidat::select($login);
				if($u!=null){
					$pagetitle = "Details de Candidat";
					$view = "read";
					require ("{$ROOT}{$DS}view{$DS}view.php");
				}
			}}	
		break;
		if(isset($_REQUEST['nom_prenom']) && isset($_REQUEST['tel']) && isset($_REQUEST['adresse']) && isset($_REQUEST['niveau_etude']) && isset($_REQUEST['ecole']) && isset($_REQUEST['nb_exp'])){
			//$oldncin = $_REQUEST['ncin'];
			$id_candidat="id_candidat";

			$tab = array(
   			 	"nom prenom" => $_REQUEST["nom_prenom"],
   			 	"telephone" => $_REQUEST["tel"],
   			 	"adresse" => $_REQUEST["adresse"],
				"niveau etude" => $_REQUEST["niveau_etude"],
				"ecole" => $_REQUEST["ecole"],
				"nombre experience" => $_REQUEST["nb_exp"]
   			 );
			//$o = ModelCandidat::select($oldncin);
			$o = ModelCandidat::select($id_candidat);
			//il faut vérifier que l'utilisateur existe dans la bdd 
			if($o!=null){
				$u = ModelCandidat::update($tab, $id_candidat);		
				$pagetitle = "Candidat modifié";
				$view = "updated";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
		}	
		break;
		
	
		case "update":
		if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
		$c = ModelCandidat::select($_SESSION['id']);
		if($c !=null){
			$pagetitle = "Modifier Profil";
			$view = "update";
			require ("{$ROOT}{$DS}view{$DS}view.php");
		}		
	
	break;
	
	case "updated": // Action du formulaire de modification
		if(isset($_REQUEST['nom_prenom']) && isset($_REQUEST['tel']) && isset($_REQUEST['adresse'])
			&& isset($_REQUEST['niveau_etude']) && isset($_REQUEST['ecole'])  && isset($_REQUEST['nb_exp'])   ){


			$nom_prenom = $_POST["nom_prenom"];
			$tel = $_POST["tel"];
			$adresse = $_POST["adresse"];
			$niveau_etude = $_POST["niveau_etude"];
			$ecole = $_POST["ecole"];
			$nb_exp = $_POST["nb_exp"];
			
			$tab = array(
			"nom_prenom" => $nom_prenom,
			"tel" => $tel,
			"adresse" => $adresse,
			"niveau_etude" => $niveau_etude,
			"ecole" => $ecole,
			"nb_exp" => $nb_exp,
			);				
           
			$c = new ModelCandidat();
				if (session_status() === PHP_SESSION_NONE) {
					session_start();
				}
				$UpdatedProfil = $c->update($tab, $_SESSION["id"]);
				header('Location: index.php?controller=candidat&action=profil');
	}	
	break;



	case "update":
		if(isset($_REQUEST['id_candidat'])){
			$o = ModelCandidat::select($_REQUEST['id_candidat']);
			if($o!=null){
				$pagetitle = "Modifier votre profil";
				$view = "update";
				if (session_status() === PHP_SESSION_NONE) {
					session_start();
				}
				$_SESSION["id_candidat"] = $_REQUEST['id_candidat'] ;
				require ("{$ROOT}{$DS}view{$DS}view.php");
			
			}
		}
			break;
			
		case "updated": // Action du formulaire de modification
			if(isset($_REQUEST['nom_prenom']) && isset($_REQUEST['tel']) && isset($_REQUEST['adresse'])
			&& isset($_REQUEST['niveau_etude']) && isset($_REQUEST['ecole'])  && isset($_REQUEST['nb_exp'])   ){
			$tab = array(
			"nom_prenom" => $_POST["nom_prenom"],
			"tel" => $_POST["tel"],
			"adresse" => $_POST["adresse"],
			"niveau_etude" => $_POST["niveau_etude"],
			"ecole" => $_POST["ecole"],
			"nb_exp" => $_POST["nb_exp"] );
			$o = new ModelCandidat();
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
			$UpdatedCandidat = $o->update($tab, $_SESSION["id_candidat"]);
			$pagetitle = "Profil modifiée avec succès";
			$view = "updated";
			require ("{$ROOT}{$DS}view{$DS}view.php");
			}
			break;
}
?>
