<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */
error_reporting(E_ALL ^ E_NOTICE);
require_once ("Model.php"); 

class ModelRecruteur extends Model {
//Même noms et ordre que dans la table utilisateur
  protected $id_recruteur;
  public $raison_social;
  public $tel;
  public $adresse;
  public $num_siret;
  public $nb_employe;
  protected $id_user;
  
  
  protected static $table = 'recruteur';
  protected static $primary = 'id_recruteur';
   
  public function __construct($id_recruteur = NULL, $raison_social = NULL, $tel = NULL , $adresse = NULL 
  , $num_siret = NULL , $nb_employe = NULL,$id_user = NULL ) {
    if (!is_null($id_recruteur) && !is_null($raison_social) && !is_null($tel) && !is_null($adresse) && 
    !is_null($num_siret) && !is_null($nb_employe) && !is_null($id_user) ) {
      $this->id_recruteur = $id_recruteur;
      $this->raison_social = $raison_social;
      $this->tel = $tel;
      $this->adresse = $adresse;
      $this->num_siret = $num_siret;
      $this->nb_employe = $nb_employe;
      $this->id_user = $id_user;
     }
  } 
 public function getIdRecruteur() {
       return $this->id_recruteur;  
  }
 public function getRaisonSocial() {
       return $this->raison_social;  
  }
  public function getTel() {
       return $this->tel;  
  }
  public function getAdresse() {
    return $this->adresse;  
}
public function getNumSiret() {
    return $this->num_siret;  
}
public function getNbEmploye() {
    return $this->nb_employe;  
}
public function getIdUser() {
    return $this->id_user;  
}
}
?>
