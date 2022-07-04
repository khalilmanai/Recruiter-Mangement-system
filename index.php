<?php
// __DIR__ est une constante "magique" de PHP qui contient le chemin du dossier courant

error_reporting(E_ALL ^ E_NOTICE);
$ROOT = __DIR__;

// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;

$controleur_default = "accueil" ;

if(!isset($_REQUEST['controller']))
				//$controller récupère $controller_default;
				$controller=$controleur_default;
			else 
				// recupère l'action passée dans l'URL
				$controller = $_REQUEST['controller'];

				
switch ($controller) {
			case "accueil" :
			// {$var} pour concaténer les chaînes de caractères 
				require ("{$ROOT}{$DS}controller{$DS}controllerAccueil.php");
				break;
				
			case "user" :
				require ("{$ROOT}{$DS}controller{$DS}controllerUser.php");
				break;

			case "candidat" :
				require ("{$ROOT}{$DS}controller{$DS}controllerCandidat.php");
				break;
			
			case "recruteur" :
				require ("{$ROOT}{$DS}controller{$DS}controllerRecruteur.php");
				break;

			case "offreEmploi" :
				require ("{$ROOT}{$DS}controller{$DS}controllerOffreEmploi.php");
				break;

			case "candidature" :
				require ("{$ROOT}{$DS}controller{$DS}controllerCandidature.php");
				break;

			case "default" :
				require ("{$ROOT}{$DS}controller{$DS}controllerAccueil.php");
				break;
}
?>