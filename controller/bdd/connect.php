<?php
/**********************************************************************
** Fonction : connectToBdd()
**
** Description: Permet la connexion à la base de données
**
** Retour: $bdd -> Objet PD connecté à la base de données
**********************************************************************/
		
		function connectToBdd(){
			$bdd = new PDO('mysql:host=localhost;dbname=dbsitemvc','root',"");
			return $bdd;
		}
 ?>