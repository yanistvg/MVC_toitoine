<?php
require_once("controller/bdd/connect.php");
class questionnaireManager
{
	public function addQuestionnaire($name)
	{
		$bdd = connectToBdd();
		$sql = "INSERT INTO `questionnaire`(`id`, `nom`, `rattachements`, `nombreQuestion`) VALUES (NULL,:nom,'',0)";
		$query = $bdd->prepare($sql);
		$query->bindParam(":nom",$name);

		$query->execute();
	}

	public function getQuestionnaires()
	{
		$bdd = connectToBdd();
		$sql = "SELECT * FROM questionnaire";
		$query = $bdd->prepare($sql);
		$query->execute();
		$data = $query->fetchAll();
		return $data;
	}
}

?>