<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ETIC 16 - Accueil</title>

	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php $page = acceuil ?>

  <div class="container">

  	<!-- Static navbar -->
    <?php include("nav_bar.php"); ?>
    <!-- /. nav -->


      <div class="col-xs-12" style="text-align:justify;"> 

       <img src="img/home.jpg" alt="" style="float:right;margin-left:20px;max-width:100%;" />
		<p>
      	La société est marquée par un chômage croissant et ce depuis plusieurs années. Le taux de chômage en France a atteint un record et cela ne va pas en s’améliorant. En effet, la robotisation du travail est l’une des plus grandes craintes du siècle à venir et certains parlent même de troisième révolution industrielle. Selon le cabinet Roland Berger, qui s’appuie sur une étude de l’Université d’Oxford de 2013<sup><a href="#note">1</a></sup>, en France 42% des métiers présentent une probabilité d’automatisation forte, et donc à moyen terme de disparition, du fait de la numérisation de l’économie.
		</p>
		<p> 
		C’est dans ce contexte qu’est apparue une proposition nouvelle et surprenante, expérimentée dans certains pays tels que le Canada ou encore l’Inde, et déjà même adoptée par la Finlande en octobre 2015 avec l'objectif de le mettre en place en 2017 : le revenu de base. Le principe est simple, certains analystes le qualifient même de simpliste, puisqu’il consiste à donner à chaque citoyen une somme fixe tous les mois, indépendamment de sa situation professionnelle ou de ses revenus, la seule distinction étant que les mineurs toucheraient moins que les adultes. Mais cette idée n’est pas nouvelle : en Alaska par exemple, elle a été mise en place par l’Alaska Permanent Fund dont le capital repose sur 25% des revenus miniers et pétroliers de l’Etat. Ainsi, toute personne résidant en Alaska depuis plus de 5 ans touchait en 2014 plus de 1800 dollars par an. 
		</p>
		<p> 
		Il serait fourvoyant de considérer le revenu de base exclusivement comme une mesure économique. Souvent le revenu de base est bien plus que cela : il s’agit d’un projet de société. Si l’on offrait une certaine somme fixe tous les mois à tous les citoyens sans contrepartie, ceux-ci seraient induits à restructurer leur vie d’une manière ou d’une autre. De nombreuses interrogations se posent sur plusieurs niveaux différents. Un débat est alors apparu sur la scène politique et médiatique en France : le revenu de base est-il une solution au chômage de masse actuel ou le début d’un monde d’assistés et un risque pour l’économie ?
		</p>
		<p> 
		Ce site se propose de présenter les acteurs de la controverse autour du revenu de base en France, ainsi que leurs positions principales et une frise chronologique, qui permette d’avoir des repères temporels et au niveau mondial autour de cette question.
		</p>


      <hr>
      <p style="font-size:11px;" ><a name="note"></a> 1.  The future of employment: how susceptible are jobs to computerisation ? De Carl Benedikt Frey and Michael A. Osborne : http://www.oxfordmartin.ox.ac.uk/downloads/academic/The_Future_of_Employment.pdf
      </p>

      </div> 
       <!-- footer -->
       <?php include("footer.php"); ?>


  </div><!-- /.container -->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.12.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>	
</body>
</html>
