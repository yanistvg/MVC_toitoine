<?php
/**************************************************************
** Classe: bddInfo
** Description: Classe gérant les requête ainsi que la connexion
** à la base de données
***************************************************************/
class bddInfo
{
	protected $name; // Nom de la base de données
	protected $address; // Adresse de connexion à la base de données
	protected $username; //Nom d'utilisateur de la base de données
	protected $password; //Mot de passe de la base de données
	protected $query; // Attribut contenant les requêtes à la base de données
	protected $linker; //Attribut contenant la connexion à la base

/**********************************************************************
 ** Fonction: __constuct()
 ** Description: Constructeur initialisant les attributs de l'objet
 **
 ** Paramètres: 	$n -> nom base de données
 **				$a -> addresse base de données
 **				$u -> nom d'utilisateur
 **				$p -> mot de passe
 **********************************************************************/

	function __construct($n,$a,$u,$p)
	{
		$this->name = $n;
		$this->address = $a;
		$this->username = $u;
		$this->password = $p;
	}

/**********************************************************************
** Fonction : getName()
** Description: Récupère le nom de la base de données
** Paramètres: Aucun
**********************************************************************/
	public function getName()
	{
		return $this->name;
	}			

/**********************************************************************
** Fonction : getAddress()
** Description: Récupère l'adresse de la base de données'
** Paramètres: Aucun
**********************************************************************/
	public function getAddress()
	{
		return $this->address;
	}

/**********************************************************************
** Fonction : getUsername()
** Description: Récupère le nom d'utilisateur de la base de données
** Paramètres: Aucun
**********************************************************************/
	public function getUsername()
	{
		return $this->username;
	}

/**********************************************************************
** Fonction : getPassword()
** Description: Récupère le mot de passe de la base de données
** Paramètres: Aucun
**********************************************************************/
	public function getPassword()
	{
		return $this->password;
	}

/**********************************************************************
** Fonction : setName()
** Description: Change le nom de la base de donées stocké
**
** Paramètres: $newName -> Nouveau nom de base de données
**********************************************************************/
	public function setName($newName)
	{
		$this->name = $newName;
	}

/**********************************************************************
** Fonction : setAddress()
** Description: Change l'adresse de la base de données
**
** Paramètres: $newAdd -> Nouvelle adresse de la base de données
**********************************************************************/
	public function setAddress($newAdd)
	{
		$this->address = $newAdd;
	}

/**********************************************************************
** Fonction : setUsername()
** Description: Change le nom d'utilisateur de la base de données
**
** Paramètres: $newUsr -> Nouveau nom d'utilisateur
**********************************************************************/
	public function setUsername($newUsr)
	{
		$this->username = $newUsr;
	}

/**********************************************************************
** Fonction : setPassword()
** Description: Change le mot de passe de la base de données
**
** Paramètres: $newPasswd -> Nouveau mot de passe
**********************************************************************/
	public function setPassword($newPasswd)
	{
		$this->password = $newPasswd;
	}

/**********************************************************************
** Fonction : bdd_link()
** Description: Etablit la connexion à la base de données et le
** le stock dans le linker
** Paramètres: Aucun
**********************************************************************/
	public function bdd_link()
	{
		try 
		{
			$this->linker = new PDO('mysql:host=' . $this->getAddress() .  ';dbname=' . $this->getName(),$this->getUsername(),$this->getPassword());
			return TRUE;
		} 
		catch (PDOException $e)
		{
			return FALSE;
		}
	}

/**********************************************************************
** Fonction : formatSQLDate()
**
** Description: Formate la date donnée en date au format français
** (ex: 2020-02-03 -> 3 Février 2020)
**
** Paramètres: $SQLDate -> date à convertir
**
** Retour: convertedDate -> Date convertit
**********************************************************************/
		public function formatSQLDate($SQLDate)
	{
		$year = "";
		$month = "";
		$day = "";
		$dayName = "";
		$monthList = array(	"01" => "Janvier",
							"02" => "Février",
							"03" => "Mars",
							"04" => "Avril",
							"05" => "Mai",
							"06" => "Juin",
							"07" => "Juillet",
							"08" => "Août",
							"09" => "Septembre",
							"10" => "Octobre",
							"11" => "Novembre",
							"12" => "Décembre");
		$date = new DateTime($SQLDate);

		$year = $date->format("Y");
		$month = $date->format("m");
		$day = $date->format("d");
		$dayName = $date->format("D");

		$convertedDate = $day . " " . $monthList[$month] . " " . $year;
		return $convertedDate;
	}

/**********************************************************************
** Fonction : formatSQLHour()
**
** Description: Formate l'heure donnée (ex: 13:25:30 => 13H25)
**
** Paramètres: $SQLhour -> heure à convertir
**
** Retour: convertedHour -> Heure convertit
**********************************************************************/
	public function formatSQLHour($SQLhour)
	{
		$minutes = "";
		$hour = "";
		$hourminute = new DateTime($SQLhour);

		$minutes = $hourminute->format("i");
		$hour = $hourminute->format("H");

		$convertedHour = $hour . "H" . $minutes;
		return $convertedHour;

	}
}


?>
