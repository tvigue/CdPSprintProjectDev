<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<!--<link rel="icon" type="image/png" href="images/favicon.ico" /> -->
	<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /><![endif]-->
	
	<title><?php echo $titre_page; ?></title>
	
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
<?php
	//if(empty($_SESSION['session'])) {
	//	echo '<a href="#">Futur lien de connexion en tant que laboratoire !</a>';
	//}
	//}
	//else {
	echo '	
	<div class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Agenda 2011 du CNRS</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="ListeAteliers.php">Accueil</a></li>
			<li><a href="#about">&Agrave; propos</a></li>
			<li><a href="#contact">Contact</a></li>
		  </ul>
		</div><!--/.nav-collapse -->
	  </div>
	</div>
	
	<div class="container">
		<div class="starter-template">
	';
	//}
?>