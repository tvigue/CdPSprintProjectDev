<?php

  if(isset($_POST['id_atelier']) && isset($_POST['page_actuelle'])) {

    $id_atelier=$_POST['id_atelier'];
    $page_actuelle=$_POST['page_actuelle'];

    // connexion à la base de données
    $db=new mysqli('localhost','root','','projet_cdp2016_acv'); //BDD chez nous
    //$db = new mysqli('dbserver','<LOGIN>','<MOT DE PASSE>','ncraeye'); //BDD à choisir si connexion au Cremi

    if($db->connect_errno) {
      printf("Echec de la connexion: %s\n", $db->connect_error);
      exit();
    }


    $query_supr_atelier="DELETE FROM Ateliers WHERE id_atelier = ".$id_atelier.";";

    //printf($query_supr_atelier);

    if(!$db->query($query_supr_atelier)){
      die("Message d'erreur : ".$db->error."<br>");
    }

    header('Location:ListeAteliers.php?page='.$page_actuelle);
  }
  else
    header('Location:ListeAteliers.php');

?>