<?php

  if(isset($_POST['id_atelier'])) {
    $id_atelier=$_POST['id_atelier'];
    //$id_atelier = 0;
    // connexion à la base
    $db=new mysqli('localhost', 'root', '', 'projet_cdp2016_acv');
    //$db=new mysqli('dbserver', '<LOGIN>', '<MOT DE PASSE>', 'tvigue'); //BDD à choisir si connexion au Cremi

    if($db->connect_errno) {
      printf("Echec de la connexion: %s\n", $db->connect_error);
      exit();
    }

    $sql="SELECT * FROM Ateliers where id_atelier = '$id_atelier';";
    if(!$result=$db->query($sql)) {
      printf("Message d'erreur : %s \n", $db->error);
    }
    $row=$result->fetch_assoc();
  }

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Création atelier</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="starter-template.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Création d'un atelier</h1>
        <form action="create.php" method="post">
          <table class="table_formulaire">
            <tr>
              <td>Nom de l'atelier</td>
              <td><input type="text" name="nom" value="<?php if(isset($row['nom_atelier'])) echo $row['nom_atelier'];?>" /></td>
            </tr>
            <tr>
              <td>Thème</td>
              <td><input type="text" name="theme" value="<?php if(isset($row['theme_atelier'])) echo $row['theme_atelier'];?>" /></td>
            </tr>
            <tr>
              <td>Type</td>
              <td><input type="text" name="type" value="<?php if(isset($row['type_atelier'])) echo $row['type_atelier'];?>" /></td>
            </tr>
            <tr>
              <td>Lieu</td>
              <td><input type="text" name="lieu" value="<?php if(isset($row['lieu_atelier'])) echo $row['lieu_atelier'];?>" /></td>
            </tr>
            <tr>
              <td>Durée(HH:MM)</td>
              <td><input type="time" name="duree" value="<?php if(isset($row['duree_atelier'])) echo $row['duree_atelier'];?>" required/></td>
            </tr>
            <tr>
              <td>Date</td>
              <td><input type="date" name="date" value="<?php if(isset($row['date_atelier'])) echo $row['date_atelier'];?>" required/></td>
            </tr>
            <tr>
              <td>Horaire</td>
              <td><input type="time" name="horaire" value="<?php if(isset($row['horaire_atelier'])) echo $row['horaire_atelier'];?>" required/></td>
            </tr>
            <tr>
              <td>Nombre de places</td>
              <td><input type="number" name="capacite" min="0" value="<?php if(isset($row['capacite_atelier'])) echo $row['capacite_atelier']; else echo "1" ?>"/></td>
            </tr>
            <tr>
              <td>Inscription</td>
              <td><input type="checkbox" name="inscription" value="<?php if(isset($row['inscription_atelier'])) echo $row['inscription_atelier'];?>" /></td>
            </tr>
            <tr>
            <?php
            if(isset($id_atelier)) {
              echo "<td colspan='2'><input type='submit' value='Modifier' name='modifier'></td>";
              echo "<input type=hidden name='id_atelier' value='$id_atelier'";
            } else {
              echo "<td colspan='2'><input type='submit' value='Ajouter' name='ajouter'></td>";
            }
            ?>
          </table>
        </form>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
