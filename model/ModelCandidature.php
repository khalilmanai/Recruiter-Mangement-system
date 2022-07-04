<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */
error_reporting(E_ALL ^ E_NOTICE);
require_once ("Model.php"); 

class ModelCandidature extends Model {
//Même noms et ordre que dans la table utilisateur
  
  protected $date_candidature;
  protected $id_candidat;
  protected $id_offre;

  protected static $table = 'candidature';
  protected static $primary = 'id_candidat';
   
  public function __construct( $date_candidature = NULL ,$id_candidat = NULL, $id_offre = NULL ) {
    if ( !is_null($id_offre) && !is_null($date_candidature)   &&  !is_null($id_candidat)) {
        $this->date_candidature = $date_candidature;
      $this->id_candidat = $id_candidat;
      $this->id_offre = $id_offre;
      
      
     }
  } 
 public function getIdCandidat() {
       return $this->id_candidat;  
  }
  public function getIdOffre() {
    return $this->id_offre;  
}
  public function getDateCandidature() {
       return $this->date_candidature;  
  }

}
?>
