<?php
	// connexion à la base
	$db = new mysqli('localhost','root','','projet_cdp2016_acv'); //BDD chez nous
  //$db = new mysqli('dbserver','<LOGIN>','<MOT DE PASSE>','ncraeye'); //BDD à choisir si connexion au Cremi

  if($db->connect_errno){
  	die("Echec de la connexion: ".$db->connect_error."<br>");
  	exit();
  }

// On commence par récupérer les champs
  if(isset($_POST['nom']))  $nom=$_POST['nom'];
  else  $nom="N";

  if(isset($_POST['theme']))  $theme=$_POST['theme'];
  else  $theme="N";

  if(isset($_POST['type']))  $type=$_POST['type'];
  else  $type="N";

  if(isset($_POST['lieu']))  $lieu=$_POST['lieu'];
  else  $lieu="N";

  if(isset($_POST['id_laboratoire']))  $id_laboratoire=$_POST['id_laboratoire'];
  else  $id_laboratoire=1;

  if(isset($_POST['date']))  $date= mysqli_real_escape_string($db,$_POST['date']);
  else $date="2016-10-07";

  if(isset($_POST['duree']))  $duree=$_POST['duree'];
  else  $duree='00:00';

  if(isset($_POST['horaire']))  $horaire=$_POST['horaire'];
  else  $horaire='00:00';

  if(isset($_POST['capacite']))  $capacite=$_POST['capacite'];
  else $capacite=0;

  if(isset($_POST['inscription']))  $inscription=1;
  else $inscription=0;

// on écrit la requête sql
  $id = $db->query("SELECT MAX(id_atelier) FROM ateliers;");
  while ($result = $id->fetch_assoc())
  {
  	if($result['MAX(id_atelier)'] == NULL){
  		$id_atelier = 0;
  	} else {
  		$id_atelier = (int)$result['MAX(id_atelier)'];
  		++$id_atelier;
  	}
  }
  echo($id_atelier);

  $sql ="INSERT INTO ateliers (id_atelier,nom_atelier,theme_atelier,type_atelier,id_laboratoire,lieu_atelier,duree_atelier,date_atelier,horaire_atelier,capacite_atelier,inscription_atelier)
  VALUES ('$id_atelier','$nom','$theme','$type','$id_laboratoire','$lieu','$duree','$date','$horaire','$capacite','$inscription')";

  if(!$db->query($sql)){
  	die("Message d'erreur : ".$db->error."<br>");
  }

	$db->close();  // on ferme la connexion
	header('Location:ListeAteliers.php');
?>