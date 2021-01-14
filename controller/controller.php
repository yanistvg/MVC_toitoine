<script>
	function RedirectionJavascript(lien){
        document.location.href=lien;
    }
</script>
<?php 
include("model/bdd.class.php");
include("model/userManager.class.php");
include("model/questionnaire.class.php");
/**********************************************************************
** Fonction : connect()
**
** Description: Vérifie la connexion utilisateur et affiche la page
** de connexion
**********************************************************************/
function connect()
{
	$userManager = new userManager();
	$secondManager = new secondUser();
	$connect = 10;
	if(isset($_POST['login']) && isset($_POST['password']) && $_POST['login'] != "" && $_POST['password'] != "")
	{
		$connect = $userManager->verifyCredential($_POST['login'],$_POST['password']);
		switch($connect)
		{
			case 0:
				$_SESSION['specia_username'] = $_POST['login'];
				$_SESSION['rank'] = "t0";
				echo "<script>RedirectionJavascript('?page=admint0')</script>";
			break;
			case 1:
				$_SESSION['specia_username'] = $_POST['login'];
				$_SESSION['rank'] = "t1";
				echo "<script>RedirectionJavascript('?page=admint1')</script>";
			break;
			case 2:
				$_SESSION['specia_username'] = $_POST['login'];
				$_SESSION['rank'] = "t2";
				echo "<script>RedirectionJavascript('?page=admint2')</script>";
			break;
			case 3:
				echo "Utilisateur ou mot de passe incorrect";
			break;
			default:
				echo "Utilisateur ou mot de passe incorrect";
			break;
		}
	}
	if(isset($_SESSION['rank']))
	{
		switch($_SESSION['rank'])
		{
			case 't1':
				echo "<script>RedirectionJavascript('?page=admint1')</script>";
			break;
			case 't2':
				echo "<script>RedirectionJavascript('?page=admint2')</script>";
			break;
			case 't0':
				// en attente
			break;
		}
	}
	include("view/connectView.php");
}

/**********************************************************************
** Fonction : admint1()
**
** Description: Affiche la page administration tier 1 et gère les 
** différentes action associé à ce niveau
**********************************************************************/
function admint1()
{
	if(!isset($_SESSION['specia_username']) OR $_SESSION['rank'] != 't1')
	{
		echo "<script>RedirectionJavascript('?page=noperm')</script>";
	}
	$userManager = new userManager();
	$secondManager = new secondUser();
	include("view/statView.php");
	include("view/userListView.php");
	if(isset($_GET["action"]))
		{
			switch ($_GET['action']) {
			case 'statistique':
				$action = $stats;
				break;
			case 'userlist':
				$action = $userList;
				break;
			default:
				$action = "Aucune donnée à afficher";
				break;
		}
	}	
	else
	{
		$action="Aucune données à afficher";
	}
	
	if(isset($_GET['disconnect']))
	{
		$userManager->disconnect();
		echo "<script>RedirectionJavascript('?page=connect')</script>";
	}
	include("view/admint1View.php");

}


/**********************************************************************
** Fonction : admint2()
**
** Description: Affiche la page administration tier 2 et gère les 
** différentes action associé à ce niveau
**********************************************************************/
function admint2()
{
	$questionnaireManager = new questionnaireManager();
	if(!isset($_SESSION['specia_username']) OR $_SESSION['rank'] != 't2')
	{
		echo "<script>RedirectionJavascript('?page=noperm')</script>";
	}
	$userManager = new userManager();
	$secondManager = new secondUser();
	include("view/userListView.php");
	include("view/questionnairesView.php");
	include("view/addUserView.php");
	include("view/userView.php");
	include("view/addQuestionnaireView.php");
	
	if(isset($_GET["action"]))
		{
			switch ($_GET['action']) {
			case 'questionnaires':
				if(isset($_POST['name']) && $_POST['name'] != "")
				{
					$questionnaireManager->addQuestionnaire($_POST['name']);
					
					echo "<script>RedirectionJavascript('?page=admint2&action=questionnaires')</script>";
				}
				$action = $questionnaires;
				break;
			case 'userlist':
				if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nbrUser']) && isset($_POST['questionnaire']) && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['nbrUser'] != "" && $_POST['nbrUser'] != 0 && is_numeric($_POST['nbrUser']) && $_POST['questionnaire'] != "none")
				{
					$userManager->addUser($_POST['username'],$_POST['password'],$_POST['nbrUser'],"","",$_POST["questionnaire"]);
					$secondManager->generateUsers($_POST['nbrUser'],$_POST['username']);

					echo "<script>RedirectionJavascript('?page=admint2&action=userlist')</script>";
				}
				$action = $userList;

				break;
			case 'addUser':
				$action = $addUser;
				break;
			case 'addQuestionnaire':
				$action = $addQuestionnaire;
				break;
			case 'userView':
				$action = $userView;
				break;
			default:
				$action = "Aucune donnée à afficher";
				break;
		}
	}	
	else
	{
		$action="Aucune données à afficher";
	}
	if(isset($_GET['disconnect']))
	{
		$userManager->disconnect();
		echo "<script>RedirectionJavascript('?page=connect')</script>";
	}
	include("view/admint2View.php");
}

?>