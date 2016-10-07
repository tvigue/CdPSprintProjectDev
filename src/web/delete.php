<?php
	$titre_page = '';
	include("includes/haut.php");

	  if(isset($_POST['id_atelier']) && isset($_POST['page_actuelle'])) {

		$id_atelier=$_POST['id_atelier'];
		$page_actuelle=$_POST['page_actuelle'];

		$query_suppr_atelier="DELETE FROM Ateliers WHERE id_atelier = ".$id_atelier.";";

		if(!$db->query($query_suppr_atelier)){
		  die("Message d'erreur : ".$db->error."<br>");
		}

		include("includes/bas.php");
		header('Location:ListeAteliers.php?page='.$page_actuelle);
	  }
	  else {
		include("includes/bas.php");
		header('Location:ListeAteliers.php');
	}
?>
