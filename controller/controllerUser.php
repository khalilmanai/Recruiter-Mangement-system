<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */
error_reporting(E_ALL ^ E_NOTICE);
$controller = "user";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelUser.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelCandidat.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelRecruteur.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelOffreEmploi.php"); 

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
switch ($action) {

	case "login" :
		if(isset($_REQUEST['login']) && isset($_REQUEST['pwd'] )){
			$login = $_REQUEST['login'];
			$pwd= $_REQUEST['pwd'];

			$u = ModelUser::login($login);
		
			if($u != null){
				if($u->pwd == $pwd){
					session_start();
					$_SESSION["id_user"] = $u->id_user ;
					if($u->is_recruteur == 1){
						$offre = new ModelOffreEmploi();
						$id_recruteur = $offre->getIdRecruteur_($u->id_user);
						$_SESSION["id"] = $id_recruteur->id_recruteur ;
						$_SESSION["is_recruteur"] = $u->is_recruteur ;
						$user = ModelRecruteur::select($id_recruteur->id_recruteur);
						$_SESSION["user"] = $user;
						
						header('Location: index.php?controller=recruteur&action=profil');
					}elseif($u->is_recruteur == 0){
						$offre = new ModelOffreEmploi();
						$id_candidat = $offre->getIdCandidat_($u->id_user);
						$_SESSION["id"] = $id_candidat->id_candidat ;
						$_SESSION["is_recruteur"] = $u->is_recruteur ;
						$user = ModelCandidat::select($id_candidat->id_candidat);
						$_SESSION["user"] = $user;
						
						header('Location: index.php?controller=candidat&action=profil');
					}
					
				}
			}else{
				header('Location: index.php?controller=accueil&action=erreur');
			}
		}
        break;

		

    case "logout":
		session_start();
		UNSET($_SESSION['id']); 
		UNSET($_SESSION['id_user']); 
		UNSET($_SESSION['is_recruteur']);
		UNSET($_SESSION['user']); 
        session_unset();
		session_destroy();
		header('Location: index.php?controller=accueil&action=readAll');
        break;

	case "read":	
		if(isset($_REQUEST['ncin'])){
			$ncin = $_REQUEST['ncin'];
			$u = ModelUser::select($ncin);
				if($u!=null){
					$pagetitle = "Details de l'utilisateur";
					$view = "read";
					require ("{$ROOT}{$DS}view{$DS}view.php");
				}
			}	
		break;
		if(isset($_REQUEST['ncin']) && isset($_REQUEST['n']) && isset($_REQUEST['p'])){
			$oldncin = $_REQUEST['ncin'];
			$tab = array(
   			 "ncin" => $_REQUEST["ncin"],
   			 "nom" => $_REQUEST["n"],
   			 "prenom" => $_REQUEST["p"]
   			 );
			$o = ModelUser::select($oldncin);
			//il faut vérifier que l'utilisateur existe dans la bdd 
			if($o!=null){
				$u = ModelUser::update($tab, $oldncin);		
				$pagetitle = "Utilisateur modifié";
				$view = "updated";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
		}	
		break;
		
	
}
?>
