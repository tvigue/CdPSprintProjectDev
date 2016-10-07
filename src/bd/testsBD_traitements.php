<?php
	ini_set('default_charset', 'utf8'); // Pour afficher les caractères accentués

	function getmicrotime() {
		list($usec, $sec) = explode(" ",microtime());
		return ((float)$usec + (float)$sec);
	}
	
	/******* Configuration *******/
	$DBhost  = "localhost";  // serveur de la bdd
	$DBowner = "root";  // login SQL
	$DBpwd   = "";  // password SQL
	$DBname  = "projet_cdp2016_acv"; // nom de la bdd

	
	echo '<h1>Tests sur la base de données : '.$DBname.'. </h1><br />';

	
	/******* Etablissement de la connexion SQL *******/
	try {
		// Sous WAMP (Windows)
		$bdd = new PDO('mysql:host='.$DBhost.';dbname='.$DBname.';charset=utf8', $DBowner, $DBpwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e) {
		die('ERREUR de connexion :' . $e->getMessage().'<br>');
	}

	echo '- La connexion à la bdd est fonctionnelle ! <br>  <br>';
	
	
	$Table_SQL = "Table_test";

	/******* Suppression d'une table *******/
	try {
	$suppr = $bdd->query('DROP TABLE IF EXISTS `'.$Table_SQL.'`');
	}
	catch (Exception $e) {
		die('ERREUR de DROP :' . $e->getMessage().'<br>');
	}
	echo '- Suppression d\'une table dans la bdd <b>'.$DBname.'</b> ok !<br>  <br>';


	/******* Création d'une table *******/
  	try {
	$suppr = $bdd->query('CREATE TABLE `'.$Table_SQL.'` (`Id` int(11) NOT NULL auto_increment,  `NOM` varchar(32) NOT NULL default \'\',  `PRENOM` varchar(32) NOT NULL default \'\', PRIMARY KEY  (`Id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8');
	}
	catch (Exception $e) {
		die('ERREUR de CREATE :' . $e->getMessage().'<br>');
	}
	echo '- Création d\'une table dans la bdd <b>'.$DBname.'</b> ok !<br>  <br>';  

	/******* Modification d'une table *******/
	//  Ajout d'éléments
  	try {
		$ajout1 = $bdd->query('INSERT INTO `'.$Table_SQL.'`  VALUES (\'\',\'DURANDAL\',\'Pierre\')');
		$ajout2 = $bdd->query('INSERT INTO `'.$Table_SQL.'`  VALUES (\'\',\'accents-éèàâ\',\'Jean-Noël\')');
	}
	catch (Exception $e) {
		die('ERREUR d\'INSERT INTO :' . $e->getMessage().'<br>');
	}
	
	// Modification d'un élément
  	try {
		$modif = $bdd->query('UPDATE `'.$Table_SQL.'` SET nom = \'DUPOND\' WHERE Id = 2');
	}
	catch (Exception $e) {
		die('ERREUR  d\'UPDATE : '. $e->getMessage());
	}

	echo '- Modification d\'une table dans la bdd <b>'.$DBname.'</b> ok !<br>  <br><br>';
  
  
	echo '<h1>Tests des requêtes sur la table : Ateliers. </h1><br />';
	
	/******* Affichage des 100 éléments *******/
	// On récupère tous les éléments contenus dans la table Ateliers
	$Date_start = getmicrotime();
	$selectAll = $bdd->query('SELECT * FROM Ateliers');
	while ($infos = $selectAll->fetch()) { // On capture les entrées une à une
	?>
		<p>
		<strong>Atelier n°<?php echo $infos['id_atelier']; ?></strong> : <?php echo $infos['nom_atelier']; ?><br />
		Il est proposé par le laboratoire n°<?php echo $infos['id_laboratoire']; ?>. <br />
		</p>
	<?php
	}
	$selectAll->closeCursor(); 	// On termine le traitement
	$rowCount_getAll = $selectAll->rowCount(); 
	if ($rowCount_getAll < 100) {
		die('ERREUR de SELECT sur la table Ateliers : ($rowCount_getAll='.$rowCount_getAll.') < 100 <br>');
	}
	$Date_end = getmicrotime();
	echo '- Requête de récupération des 100 ateliers : ok !<br> <br>';

	/******* Affichage de 5 éléments *******/
	// On récupère la partie de la table dont id_laboratoire = 89
	$id_labo = 89;
	$selectByLabo = $bdd->query('SELECT * FROM Ateliers AS At WHERE id_laboratoire='.$id_labo.' ORDER BY At.date_atelier ASC');
	$result_count_row_get = $selectByLabo->rowCount(); 
	if ($result_count_row_get != 5)	{
		die('ERREUR de SELECT partiel sur la table Ateliers : ($result_count_row_get='.$result_count_row_get.') != 5 <br>');
	}
	echo '- Requête de récupération des 5 ateliers du laboratoire n°'.$id_labo.' : ok !<br> <br>';
	
	
	/******* Insertion d'un élément *******/
	$insertInto = $bdd->query('INSERT INTO Ateliers (`id_atelier`, `nom_atelier`, `theme_atelier`, `type_atelier`, `id_laboratoire`, `lieu_atelier`, `duree_atelier`, `date_atelier`, `horaire_atelier`, `capacite_atelier`, `inscription_atelier`) VALUES (101,"[value-2]","[value-3]","[value-4]",101,"[value-6]","[value-7]","[value-8]","[value-9]",10,11)');
	$selectById = $bdd->query('SELECT * FROM Ateliers WHERE id_atelier=101');
	$result_count_row_get = $selectById->rowCount(); 
	if ($result_count_row_get != 1)	{
		die('ERREUR d\'insertion dans la table Ateliers : ($result_count_row_get='.$result_count_row_get.') != 1 <br>');
	}
	echo '- Requête d\'insertion d\'un atelier dans la table : ok !<br> <br>';
	
	
	/******* Suppression d'un élément *******/
	$id_toDel=$rowCount_getAll+1;
	$delete = $bdd->query('DELETE FROM Ateliers WHERE id_atelier = '.$id_toDel.' AND id_laboratoire = 102');
	$selectByLabo = $bdd->query('SELECT * FROM Ateliers WHERE id_laboratoire=102');
	$result_count_row_get = $selectByLabo->rowCount(); 
	if ($result_count_row_get != 0) {
		die('ERREUR de suppression dans la table Ateliers : ($result_count_row_get='.$result_count_row_get.') != 0 <br>');
	}
	echo '- Requête de suppression d\'un atelier dans la table : ok !<br> <br>';

	/******* Modification d'un élément *******/
	$update = $bdd->query('UPDATE Ateliers SET nom_atelier = "nom", theme_atelier="theme", type_atelier="type", lieu_atelier="lieu", duree_atelier="duree", date_atelier="date", horaire_atelier="horaire", capacite_atelier=10, inscription_atelier=1 WHERE id_atelier = 17 AND id_laboratoire = 89');
	$selectByIds = $bdd->query('SELECT * FROM Ateliers WHERE id_atelier=17 AND id_laboratoire=89');
	$rep = $selectByIds->fetch();
	if ($rep['id_atelier']==17 && $rep['nom_atelier']=="nom" && $rep['theme_atelier']=="theme" && $rep['type_atelier']=="type" && $rep['id_laboratoire']==89 && $rep['lieu_atelier']=="lieu" && $rep['duree_atelier']=="duree" && $rep['date_atelier']=="date" && $rep['horaire_atelier']="horaire" && $rep['capacite_atelier']==10 && $rep['inscription_atelier']==1) {
		die('ERREUR de modification dans la table Ateliers. <br>');
	}
	echo '- Requête de modification d\'un atelier dans la table : ok !<br><br><br>';

	
	echo "<h1>Tests de performance</h1><br />";
	$Duree = $Date_end - $Date_start;
	$Duree = sprintf("%01.2f", $Duree);
	echo "Le traitement des 100 données de cette BDD a une durée égale à <b>$Duree</b> secondes. <br>";
?>
