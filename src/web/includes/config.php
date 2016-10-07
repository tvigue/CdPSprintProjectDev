<?php 
session_start(); // cette fonction est obligatoire dans toute les pages avant le code html

/******* Configuration BDD chez nous *******/
$DBhost  = "localhost";  // serveur de la bdd
$DBowner = "root";  // login SQL
$DBpwd   = "";  // password SQL
$DBname  = "projet_cdp2016_acv"; // nom de la bdd
	
/******* Configuration BDD au Cremi // à choisir si connexion au Cremi *******/
// $DBhost  = "dbserver";  // serveur de la bdd
// $DBowner = "<LOGIN DE LA SESSION>";  // login SQL
// $DBpwd   = "<MOT DE PASSE DE LA SESSION>";  // password SQL
// $DBname  = "tvigue"; // nom de la bdd
	
/******* Etablissement de la connexion SQL *******/
$db=new mysqli($DBhost,$DBowner,$DBpwd,$DBname); 
if($db->connect_errno) {
	printf("Echec de la connexion: %s\n", $db->connect_error);
	exit();
}

?>