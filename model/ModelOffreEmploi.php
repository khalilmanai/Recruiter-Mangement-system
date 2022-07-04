<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */
error_reporting(E_ALL ^ E_NOTICE);
require_once ("Model.php"); 


class ModelOffreEmploi extends Model {
//Même noms et ordre que dans la table utilisateur
  public $id_offre;
  public $date;
  public $date_exp;
  public $description;
  protected $id_recruteur;

  
  protected static $table = 'offreemploi';
  protected static $primary = 'id_offre';
   
  public function __construct($id_offre = NULL, $date = NULL, $date_exp = NULL , $description = NULL , $id_recruteur= NULL) {
    if ( !is_null($date) && !is_null($date_exp) && !is_null($description)) {
      $this->id_offre = $id_offre;
      $this->date = $date;
      $this->date_exp = $date_exp;
      $this->description = $description;
      $this->id_recruteur = $id_recruteur;
      
     }
  } 

  public function getIdRecruteur_($id_user){
		$sql = "SELECT id_recruteur FROM `recruteur` WHERE id_user='$id_user'";

		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->execute();
		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model');
			  if ($req_prep->rowCount() != 0){
				$rslt = $req_prep->fetch();
				return $rslt;
				  die();
				}else{
				return null;
				die();
			  }
	}

  public function getIdCandidat_($id_user){
		$sql = "SELECT id_candidat FROM `candidat` WHERE id_user='$id_user'";

		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->execute();
		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model'.ucfirst(`recruteur`));
			  if ($req_prep->rowCount() != 0){
				$rslt = $req_prep->fetch();
				return $rslt;
				  die();
				}else{
				return null;
				die();
			  }
	}
  
 public function getIdOffre() {
       return $this->id_offre;  
  }
 public function getDate() {
       return $this->date;  
  }
  public function getDateExp() {
       return $this->date_exp;  
  }
  public function getDescription() {
    return $this->description;  
  }
  public function getIdRecruteur() {
    return $this->id_recruteur;  
  }

}
?>
