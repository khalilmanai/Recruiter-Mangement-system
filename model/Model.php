<?php
error_reporting(E_ALL ^ E_NOTICE);
/* c'est le DAO (Data Access Object): Il sert
d’interface entre l’objet métier et la source
physique de données, grâce à PDO.
On y retrouve les requêtes CRUD (Create, Read, Update, Delete)
ainsi que d’autres requêtes d’extraction (recherche,…) */

require_once ("{$ROOT}{$DS}config{$DS}Conf.php"); 

class Model{
	  
	protected static $pdo;
	
	public static function Init(){
		$host = Conf::getHostname();
		$dbname = Conf::getDatabase();
		$login = Conf::getLogin();
		$pass = Conf::getPassword();
		try{
			self::$pdo = new PDO("mysql:host=$host;dbname=$dbname",$login,$pass);
			} catch(PDOException $e) {
				die ($e->getMessage()); 
			}
	}

	public static function getAll(){
	    $SQL="SELECT * FROM ".static::$table;
		$rep = self::$pdo->query($SQL);
		
	    $rep->setFetchMode(PDO::FETCH_CLASS, 'Model');

		return $rep->fetchAll();
	}

	public static function getAllOffre($id){
		$sql = "SELECT * FROM `offreemploi` WHERE id_recruteur=". $id;

		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->execute();
		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model');
			  if ($req_prep->rowCount() != 0){
				$rslt = $req_prep->fetchAll();
				return $rslt;
				  die();
				}else{
				return null;
				die();
			  }
	}


	public static function getCandidature($id){
		$sql = "SELECT id_offre FROM `candidature` WHERE id_candidat=". $id;

		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->execute();
		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model');
			  if ($req_prep->rowCount() != 0){
				$rslt = $req_prep->fetchAll();
				return $rslt;
				  die();
				}else{
				return null;
				die();
			  }
	}

	public static function getCandidatOffre($id){
		$sql = "SELECT id_candidat FROM `candidature` WHERE id_offre=". $id;

		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->execute();
		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model');
			  if ($req_prep->rowCount() != 0){
				$rslt = $req_prep->fetchAll();
				return $rslt;
				  die();
				}else{
				return null;
				die();
			  }
	}






	public static function getAllO(){
		$sql = "SELECT * FROM `offreemploi`";

		$req_prep = Model::$pdo->prepare($sql);
		$req_prep->execute();
		$req_prep->setFetchMode(PDO::FETCH_CLASS,'Model');
			  if ($req_prep->rowCount() != 0){
				$rslt = $req_prep->fetchAll();
				return $rslt;
				  die();
				}else{
				return null;
				die();
			  }
	}
	
    public static function select($cle_primaire) {
	    $sql = "SELECT * from ".static::$table." WHERE ".static::$primary."=:cle_primaire";
	    $req_prep = self::$pdo->prepare($sql);
	    $req_prep->bindParam(":cle_primaire", $cle_primaire);
	    $req_prep->execute();
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model');
	    if ($req_prep->rowCount()==0){
			return null;
			die();
	  	}else{
			$rslt = $req_prep->fetch();
			return $rslt;
		}
	      
  	}

	public static function delete($cle_primaire) {
		$sql = "DELETE FROM ".static::$table." WHERE ".static::$primary."=:cle_primaire";
		$req_prep = self::$pdo->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();
	}
	
	public function insert($tab){
    $sql = "INSERT INTO ".static::$table." VALUES(";
    foreach ($tab as $cle => $valeur){
		$sql .=" :".$cle.",";
	}
	$sql=rtrim($sql,",");
	$sql.=");";
    $req_prep = self::$pdo->prepare($sql);
    $values = array();
    foreach ($tab as $cle => $valeur)
      		$values[":".$cle] = $valeur;
	// execute prend l'argument $values puisqu'on a pas utilisé bindParam
    $req_prep->execute($values);
	return self::$pdo->lastInsertId();
  }

	public static function update($tab, $cle_primaire) {
		$sql = "UPDATE ".static::$table." SET";
		foreach ($tab as $cle => $valeur){
			$sql .=" ".$cle."=:new".$cle.",";
		}
		$sql=rtrim($sql,",");
		$sql.=" WHERE ".static::$primary."=:oldid;";
		
		  $req_prep = self::$pdo->prepare($sql);
		  $values = array();
	  
	  foreach ($tab as $cle => $valeur){
				$values[":new".$cle] = $valeur;
		  }
		  $values[":oldid"] = $cle_primaire;
		  $req_prep->execute($values);
		  $obj = self::select($tab[static::$primary]);
		  return $obj;
  }

  public static function login($username){

	$sql = "SELECT * FROM `users` WHERE login='$username'";

	$req_prep = Model::$pdo->prepare($sql);
	  //$req_prep->bindParam("", $username);
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
	
}//class
Model::Init();