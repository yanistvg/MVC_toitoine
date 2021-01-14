 <?php
/**************************************************************
** Classe: SecondUser
** Description: Classe gérant les différentes action des 
** utilisateurs secondaire vers la BDD
***************************************************************/
class SecondUser{

/**********************************************************************
** Fonction : userAndPassGenerator()
**
** Description: Génère un utilisateur et un mot de passe aléatoire
**
** Retour: $newStr -> Chaine aléatoire de 10 caractères
**********************************************************************/
	public function userAndPassGenerator()
	{
		$str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$str = str_shuffle($str);
		$newStr = substr($str,0,10);
		return $newStr;
	}

/**********************************************************************
** Fonction : generateUsers
**
** Description: Génère les utilisateurs associés à un main_user dans
** la BDD
**
** Paramètres: 	$nbr -> Nombre d'utilisateurs à générer
**				$username -> main_user reliés aux utilisateurs
**********************************************************************/
	public function generateUsers($nbr,$username)
	{
		$bdd = connectToBdd();
		$sql = "SELECT * FROM main_user WHERE username = :user";
		$query = $bdd->prepare($sql);
		$query->bindParam(":user",$username);
		$query->execute();
		$data = $query->fetch();
		for($i = 0;$i<$nbr;$i++)
		{
			$user = $this->userAndPassGenerator();
			$pass = $this->userAndPassGenerator();
			$sql = "INSERT INTO `second_user`(`id`, `username`, `password`,`main_user_id`) VALUES (NULL,:username,:passwd,:mainId)";
			$query = $bdd->prepare($sql);
			$query->bindParam(":username",$user);
			$query->bindParam(":passwd",$pass);
			$query->bindParam(":mainId",$data['id']);
			$query->execute();
		}
	}

/**********************************************************************
** Fonction : getUsers()
**
** Description: Récupères la liste des utilisateurs secondaires
**
** Retour: 	$data -> Tableau contenant tout les utilisateurs
**********************************************************************/
	public function getUsers()
	{
		$bdd = connectToBdd();
		$sql = "SELECT * FROM second_user";
		$query = $bdd->prepare($sql);
		$query->execute();
		$data = $query->fetchAll();
		return $data;
	}

/**********************************************************************
** Fonction : getUsersFromId($id)
**
** Description: Récupères la liste des utilisateurs secondaires selon leur ID
**
** Retour: 	$data -> Tableau contenant tout les utilisateurs
**********************************************************************/

	public function getUsersFromUsername($username)
	{
		$bdd = connectToBdd();
		$sql = "SELECT id FROM main_user WHERE username = :username";
		$query = $bdd->prepare($sql);
		$query->bindParam(':username',$username);
		$query->execute();
		$main_id = $query->fetch()['id'];

		$sql = "SELECT * FROM second_user WHERE main_user_id = :main_id";
		$query = $bdd->prepare($sql);
		$query->bindParam(':main_id',$main_id);
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
		$sql = "SELECT * FROM second_user WHERE username = :user";
		$query = $bdd->prepare($sql);
		$query->bindParam(':user',$username);
		$query->execute();
		$user = $query->fetch();
		return $user;
	}

/*******************************************************
 * Fonction : disconnect()
 * 
 * Description: Déconnecte l'utilisateur
 *******************************************************/
public function disconnect()
{
	$_SESSION = array();
	session_destroy();
}

}

 ?>