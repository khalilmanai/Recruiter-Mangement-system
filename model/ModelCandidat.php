<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */
error_reporting(E_ALL ^ E_NOTICE);
require_once ("Model.php"); 

class ModelCandidat extends Model {
//Même noms et ordre que dans la table utilisateur
  protected $id_candidat;
  public $nom_prenom;
  public $tel;
  public $adresse;
  public $niveau_etude;
  public $ecole;
  public $nb_exp;
  protected $id_user;
  
  protected static $table = 'candidat';
  protected static $primary = 'id_candidat';
   
  public function __construct($id_candidat = NULL, $nom_prenom = NULL, $tel = NULL , $adresse = NULL 
  , $niveau_etude = NULL , $ecole = NULL , $nb_exp = NULL , $id_user = NULL) {
    if (!is_null($id_candidat) && !is_null($nom_prenom) && !is_null($tel) && !is_null($adresse) && 
    !is_null($niveau_etude) && !is_null($ecole) && !is_null($nb_exp) && !is_null($id_user)) {
      $this->id_candidat = $id_candidat;
      $this->nom_prenom = $nom_prenom;
      $this->tel = $tel;
      $this->adresse = $adresse;
      $this->niveau_etude = $niveau_etude;
      $this->ecole = $ecole;
      $this->nb_exp = $nb_exp;
      $this->id_user = $id_user;
      
     }
  } 
 public function getIdCandidat() {
       return $this->id_candidat;  
  }
 public function getNomPrenom() {
       return $this->nom_prenom;  
  }
  public function getTel() {
       return $this->tel;  
  }
  public function getAdresse() {
    return $this->adresse;  
}
public function getNiveauEtude() {
    return $this->niveau_etude;  
}
public function getEcole() {
    return $this->ecole;  
}
public function getNbExp() {
    return $this->nb_exp;  
}
public function getIdUser() {
    return $this->id_user;  
}
}
?>
