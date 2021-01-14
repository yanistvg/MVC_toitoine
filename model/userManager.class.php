<?php
require("controller/bdd/connect.php");
require_once("model/secondUser.class.php");

/**************************************************************
** Classe: userManager
** Description: Classe gérant les différentes action des 
** utilisateurs principaux vers la BDD
***************************************************************/
class userManager{

/**********************************************************************
** Fonction : addUser()
**
** Paramètres: 	$username -> Nom d'utilisateur
**				$password -> Mot de passe
**				$nbrUsers -> nombre d'utilisateurs secondaire associés
**				$email -> Email de l'utilisateur
**				$tel -> Numéro de téléphone
**				$qid -> ID du questionnaire associé
**
** Description: Ajoute un utilisateur à la base de données
**********************************************************************/
	public function addUser($username,$password,$nbrUsers,$email = "",$tel = "",$qid = 0)
	{
		$bdd = connectToBdd();
		$sql = "INSERT INTO `main_user`(`id`, `username`, `password`, `email`, `tel`,`nbrUsers`, `questionnaire_id`,`rank`) VALUES (NULL,:username,:passwd,:email,:tel,:nbrusers,:questionnaire_id,'t1')";
		$query = $bdd->prepare($sql);
		$query->bindParam(":username",$username);
		$query->bindParam(":passwd",$password);
		$query->bindParam(":email",$email);
		$query->bindParam(":tel",$tel);
		$query->bindParam(":nbrusers",$nbrUsers);
		$query->bindParam(":questionnaire_id",$qid);
		$query->execute();
	}


/**********************************************************************
** Fonction : delUser()
**
** Paramètres: 	$username -> Nom d'utilisateur à supprimer
**				
** Description: Supprime un utilisateur
**********************************************************************/
	public function delUser($username)
	{
		$bdd = connectToBdd();
		$sql = "DELETE FROM main_user WHERE username = :username";
		$query = $bdd->prepare($sql);
		$query->bindParam(":username",$username);
		$query->execute();
	}

/**********************************************************************
** Fonction : getUsers()
**
** Description: Récupères la liste des utilisateurs principaux
**
** Retour: 	$data -> Tableau contenant tout les utilisateurs
**********************************************************************/
	public function getUsers()
	{
		$bdd = connectToBdd();
		$sql = "SELECT * FROM main_user";
		$query = $bdd->prepare($sql);
		$query->execute();
		$data = $query->fetchAll();
		return $data;
	}

/**********************************************************************
** Fonction : getSingleUser()
**
** Description: Récupères un utilisateur particulier
**
** Retour: 	$user -> Tableau contenant les info utilisateur
**********************************************************************/
	public function getSingleUser($username)
	{
		$bdd = connectToBdd();
		$sql = "SELECT * FROM main_user WHERE username = :user";
		$query = $bdd->prepare($sql);
		$query->bindParam(':user',$username);
		$query->execute();
		$user = $query->fetch();
		return $user;
	}
/**********************************************************************
** Fonction : verifyCredential()
**
** Paramètres: 	$username -> Nom d'utilisateur à vérifier
**				$password -> Mot de passe à vérifier
**
** Description: Vérifie la combinaison utilisateur mot de passe
**
** Retour: 	0 -> Utilisateur normal
** 			1 -> Admin Tier 1
**			2 -> Admin Tier 2
**			3 -> Utilisateur ou mot de passe incorrect
**********************************************************************/
	public function verifyCredential($username,$password)
	{
		$secondManager = new SecondUser();
		$validate = 4;
		$data = array();
		
		//Verification admint1 ou t2
		$data = $this->getSingleUser($username);
		if(isset($data['username']) && isset($data['password']) && $username == $data['username'] && $password == $data['password'])
		{
			if(isset($data["rank"]) && $data["rank"] != "" && $data['rank'] == "t2")
			{
				$validate = 2;
			}
			else
			{
				$validate = 1;
			}
		}
	

		//Verification utilisateur normal
		$data = $secondManager->getSingleUser($username);
		if(isset($data['username']) && isset($data['password']) && $username == $data['username'] && $password == $data['password'])
		{
			$validate = 0;
		}
	
		return $validate;
	}

	public function disconnect()
	{
		$_SESSION = array();
		session_destroy();
	}

}

?>