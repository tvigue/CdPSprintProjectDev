<?php
	$titre_page = 'Agenda du CNRS - Un atelier';
	include("includes/haut.php");


	if(isset($_POST['id_atelier'])) {
		$id_atelier=$_POST['id_atelier'];

		$sql="SELECT * FROM Ateliers WHERE id_atelier = '$id_atelier';";
		if(!$result=$db->query($sql)) {
		  printf("Message d'erreur : %s \n", $db->error);
		}
		$row=$result->fetch_assoc();
	}

	if(isset($_POST['action_page'])) {
		$action = $_POST['action_page']; 
		if($action == "ajouter") {
			echo "<h1>Création d'un atelier</h1>";
		} else if($action == "modifier") {
			echo "<h1>Modification d'un atelier</h1>";
		} else {
			header('Location:ListeAteliers.php');
		}
	}
 
?>

	<form action="create.php" method="post">
	  <table class="table_formulaire">
		<tr>
		  <td>Nom</td>
		  <td><input type="text" name="nom" placeholder="Nom de l'atelier" value="<?php if(isset($row['nom_atelier'])) echo $row['nom_atelier'];?>" required/></td>
		</tr>
		<tr>
		  <td>Thème</td>
		  <td><input type="text" name="theme" placeholder="Thème de l'atelier" value="<?php if(isset($row['theme_atelier'])) echo $row['theme_atelier'];?>" /></td>
		</tr>
		<tr>
		  <td>Type</td>
		  <td><input type="text" name="type" placeholder="Type de l'atelier" value="<?php if(isset($row['type_atelier'])) echo $row['type_atelier'];?>" /></td>
		</tr>
		<tr>
		  <td>Lieu</td>
		  <td><input type="text" name="lieu" placeholder="Emplacement de l'atelier" value="<?php if(isset($row['lieu_atelier'])) echo $row['lieu_atelier'];?>" /></td>
		</tr>
		<tr>
		  <td>Durée (HH:mm)</td>
		  <td><input type="time" name="duree" value="<?php if(isset($row['duree_atelier'])) echo $row['duree_atelier'];?>" required/></td>
		</tr>
		<tr>
		  <td>Date (jj/mm/aaaa)</td>
		  <td><input type="date" name="date" value="<?php if(isset($row['date_atelier'])) echo $row['date_atelier'];?>" required/></td>
		</tr>
		<tr>
		  <td>Horaire de début (HH:mm)</td>
		  <td><input type="time" name="horaire" value="<?php if(isset($row['horaire_atelier'])) echo $row['horaire_atelier'];?>" required/></td>
		</tr>
		<tr>
		  <td>Nombre de places</td>
		  <td><input type="number" name="capacite" min="0" value="<?php if(isset($row['capacite_atelier'])) echo $row['capacite_atelier']; else echo "1" ?>" required/></td>
		</tr>
		<tr>
		  <td>Inscription</td>
		  <td><input type="checkbox" name="inscription" value="<?php if(isset($row['inscription_atelier'])) echo $row['inscription_atelier'];?>" /></td>
		</tr>
		<tr>
		<?php
		if($action == "modifier") {
		  echo "
			<td colspan='2'><input type=hidden name='id_atelier' value='$id_atelier'><input class='btn btn-primary' type='submit' value='Modifier' name='modifier'></td>";
		} else {
		  echo "
			<td colspan='2'><input class='btn btn-primary' type='submit' value='Ajouter' name='ajouter'></td>";
		}
		?>
	  </table>
	</form>

<?php include("includes/bas.php"); ?>
