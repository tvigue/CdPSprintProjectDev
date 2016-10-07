<?php
	$titre_page = 'Agenda du CNRS - Vos ateliers';
	include("includes/haut.php");

?>

	<table style="width: 100%;">
		<tr>
		  <td><h1>Liste des ateliers</h1></td>
			<td style="text-align: right;">
			<form style="display: inline;" action="FormulaireAtelier.php" method="post"> 
				<div>
				  <input type="hidden" name="action_page" value="ajouter"/>
				  <input class="btn btn-primary" type="submit" value="Créer un atelier"/>
				</div>
			</form>
		</td>
		</tr>
	</table>

	<table class="table table-bordered">
		<thead>
		  <tr>
			<th>Titre</th>
			<th>Thème</th>
			<th>Type</th>
			<th>Actions</th>
		  </tr>
		</thead>
	<tbody>

<?php

  // calcul du nombre de pages
  $article_par_pages=20;

  $query_nombre_ateliers="SELECT * FROM Ateliers";

  if($result=$db->query($query_nombre_ateliers)) {
	$nombre_lignes=mysqli_num_rows($result);
	$nombre_de_pages=ceil($nombre_lignes/$article_par_pages);

	$result->close(); // libération du jeu de résultats
  }

  // affichage des ateliers de la page en cours
  if(isset($_GET['page'])) {
    $page_actuelle=intval($_GET['page']);

    if($page_actuelle>$nombre_de_pages) {
      $page_actuelle=$nombre_de_pages;
    }
  } else {
    $page_actuelle=1;
  }

  $id_premiere_ligne=($page_actuelle-1)*$article_par_pages;

  $query_ateliers="SELECT * FROM Ateliers AS A ORDER BY A.date_atelier ASC LIMIT ".$id_premiere_ligne.", ".$article_par_pages;

  if($result=$db->query($query_ateliers)) {
    while ($row=$result->fetch_assoc()) {
      echo '
			<tr>
	            <td>'.$row["nom_atelier"].'</td>
				<td>'.$row["theme_atelier"].'</td>
				<td>'.$row['type_atelier'].'</td>
				<td>
					<form style="display: inline;" action="FormulaireAtelier.php" method="post">
						<input type="hidden" name="action_page" value="modifier"/>
						<input type="hidden" name="id_atelier" value='.$row["id_atelier"].'/>
						<input class="btn btn-default" type="submit" value="Modifier"/>
					</form>
					<form style="display: inline;" action="delete.php" method="post">
						<input type="hidden" name="id_atelier" value="'.$row["id_atelier"].'"/>
						<input type="hidden" name="page_actuelle" value="'.$page_actuelle.'"/>
						<input class="btn btn-default" type="submit" value="Supprimer"/>
					</form>
				</td>
			</tr>';
	}

    $result->close();
  }

  printf("\t\t  </tbody>\n\t\t</table>\n");

  // affichage de la liste des pages
  echo '<p style="text-align:center">Page : ';
  for($i=1; $i<=$nombre_de_pages; $i++) {
    if($i==$page_actuelle) {
      echo ' [ '.$i.' ] ';
    } else {
      echo ' <a href="ListeAteliers.php?page='.$i.'\">'.$i.'</a> ';
    }
  }
  echo '</p>';

  include("includes/bas.php");
?>
