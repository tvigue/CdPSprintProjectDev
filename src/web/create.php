<?php

// connexion à la base
$db = new mysqli('localhost','root','','projet_cdp2016_acv');

if($db->connect_errno){
printf("Echec de la connexion: %s\n", $db->connect_error);
exit();
}
  // On commence par récupérer les champs
  if(isset($_POST['nom']))      $nom=$_POST['nom'];

  if(isset($_POST['theme']))      $theme=$_POST['theme'];

  if(isset($_POST['type']))      $type=$_POST['type'];

  if(isset($_POST['lieu']))      $lieu=$_POST['lieu'];

  if(isset($_POST['id_laboratoire']))      $id_laboratoire=$_POST['id_laboratoire'];
    else      $id_laboratoire=1;

  if(isset($_POST['date']))      $date= mysqli_real_escape_string($db,$_POST['date']);

  if(isset($_POST['duree']))      $duree=$_POST['duree'];
  $duree .=':00';

  if(isset($_POST['horaire']))      $horaire=$_POST['horaire'];
  $horaire .=':00';

  if(isset($_POST['capacite']))      $capacite=$_POST['capacite'];

  if(isset($_POST['inscription']))      $inscription=1;
    else $inscription =0;

    // on écrit la requête sql
    $id = $db->query("SELECT MAX(id_atelier) FROM Ateliers;");
    while ($result = $id->fetch_assoc())
    {
      if($result['MAX(id_atelier)'] == NULL){
        $id_atelier = 0;
      } else {
        $id_atelier = (int)$result['MAX(id_atelier)'];
        ++$id_atelier;
      }
    }

    $sql ="INSERT INTO Ateliers (id_atelier,nom_atelier,theme_atelier,type_atelier,id_laboratoire,lieu_atelier,duree_atelier,date_atelier,horaire_atelier,capacite_atelier,inscription_atelier)
    VALUES ('$id_atelier','$nom','$theme','$type','$id_laboratoire','$lieu','$duree','$date','$horaire','$capacite','$inscription')";

    if(!$db->query($sql)){
      printf("Message d'erreur : %s \n", $db->error);
    }

    $db->close();  // on ferme la connexion
    header('location : ListeAteliers.php');
?>
