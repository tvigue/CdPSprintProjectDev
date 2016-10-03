<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Liste ateliers</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

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
        <h1>Liste ateliers</h1>
        <table class="table_ateliers">
<?php

// connexion à la base de données
$db = new mysqli('localhost','root','','projet_cdp2016_acv');

if($db->connect_errno) {
  printf("Echec de la connexion: %s\n", $db->connect_error);
  exit();
}

// calcule du nombre de pages
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
    printf("%d %s %s %s %d %s %s %s %s %d %d<br>\n", $row["id_atelier"], $row["nom_atelier"], $row["theme_atelier"], $row["type_atelier"], $row["id_laboratoire"], $row["lieu_atelier"], $row["duree_atelier"], $row["date_atelier"], $row["horaire_atelier"], $row["capacite_atelier"], $row["inscription_atelier"]);
  }

  $result->close();
}

$db->close();  // on ferme la connexion

// affichage de la liste des pages
printf("<p align=\"center\">\nPage : ");
for($i=1; $i<=$nombre_de_pages; $i++) {
  if($i==$page_actuelle) {
    printf(" [ %d ] \n", $i);
  } else {
    printf(" <a href=\"ListeAteliers.php?page=%d\">%d</a> \n", $i, $i);
  }
}
printf("</p>\n");

?>
        </table>
      </div>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>