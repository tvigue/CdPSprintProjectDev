<?php
$titre_page = '';
include("includes/haut.php");

  // On commence par récupérer les champs
  if(isset($_POST['nom']))
    $nom=$_POST['nom'];

  if(isset($_POST['theme']))
    $theme=$_POST['theme'];

  if(isset($_POST['type']))
    $type=$_POST['type'];

  if(isset($_POST['lieu']))
    $lieu=$_POST['lieu'];

  if(isset($_POST['id_laboratoire']))
    $id_laboratoire=$_POST['id_laboratoire'];
  else
    $id_laboratoire=1;

  if(isset($_POST['duree']))
    $duree=$_POST['duree'];

  if(isset($_POST['horaire']))
    $horaire=$_POST['horaire'];

  if(isset($_POST['date']))
    $date=mysqli_real_escape_string($db,$_POST['date']);

  if(isset($_POST['capacite']))
    $capacite=$_POST['capacite'];

  if(isset($_POST['inscription']))
    $inscription=1;
  else
    $inscription=0;
  
  // Update Atelier
  if(isset($_POST['id_atelier'])) {
    $id_atelier=$_POST['id_atelier'];
    $sql="UPDATE Ateliers SET nom_atelier = '$nom', theme_atelier = '$theme', type_atelier = '$type', lieu_atelier ='$lieu', duree_atelier = '$duree', horaire_atelier ='$horaire',  capacite_atelier ='$capacite', inscription_atelier = '$inscription'
    WHERE id_atelier = '$id_atelier';";
  } else {
    $duree.=':00';
    $horaire.=':00';
    $sql="INSERT INTO Ateliers (nom_atelier, theme_atelier, type_atelier, id_laboratoire, lieu_atelier, duree_atelier, date_atelier, horaire_atelier, capacite_atelier, inscription_atelier)
    VALUES ('$nom', '$theme', '$type', '$id_laboratoire', '$lieu', '$duree', '$date', '$horaire', '$capacite', '$inscription');";
  }

  if(!$db->query($sql)) {
    printf("Message d'erreur : %s \n", $db->error);
  }

  include("includes/bas.php");
  header('Location:ListeAteliers.php');
  
?>
