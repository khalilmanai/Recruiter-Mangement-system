<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */
error_reporting(E_ALL ^ E_NOTICE);
require_once ("Model.php"); 

class ModelUser extends Model{
//Même noms et ordre que dans la table utilisateur
  protected $id_user;
  protected $email;
  protected $login;
  protected $pwd;
  protected $is_recruteur;
  protected static $table = 'users';
  protected static $primary = 'id_user';
   
  public function __construct($id_user = NULL,  $email = NULL, $login = NULL, $pwd = NULL , $is_recruteur = NULL) {
    if (!is_null($id_user) && !is_null($login) && !is_null($pwd) && !is_null($is_recruteur)) {
      $this->id_user = $id_user;
      $this->login = $login;
      $this->pwd = $pwd;
      $this->is_recruteur = $is_recruteur;
      
     }
  } 
 public function getIdUser() {
       return $this->id_user;  
  }
 public function getLogin() {
       return $this->login;  
  }
  public function getPwd() {
       return $this->pwd;  
  }
  public function getTypeCompte() {
    return $this->is_recruteur;  
}
public function getEmail() {
    return $this->email;  
}

}
?>
