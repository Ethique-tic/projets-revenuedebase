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


      <div class=".col-xs-12" style="text-align:justify;"> 


	La société est marquée par un chômage croissant et ce depuis plusieurs années.
Le taux de chômage en France a atteint un record et cela ne va pas en s’améliorant. En
effet, la robotisation du travail est l’une des plus grande crainte du siècle à venir et certains
parlent même de troisième révolution industrielle. Au sein du marché de l’emploi français,
42% des métiers présentent une probabilité d’automatisation forte, et donc à moyen terme
de disparition, du fait de la numérisation de l’économie selon le cabinet Roland Berger qui
s’appuie sur une étude de l’Université d’Oxford de 2013<sup><a href="#note">1</a></sup> . C’est dans ce contexte qu’est
apparue une proposition nouvelle et surprenante, expérimentée dans certains pays tels
que le Canada ou encore l’Inde, et déjà même adoptée par la Finlande pour 2017: le
revenu de base. Le principe est simple, nombreux articles le qualifient même de simplisme
puisqu’il consiste à donner à chaque citoyen une somme fixe tous les mois,
inconditionnellement de sa situation professionnelle ou de ses revenus, la seule distinction
étant que les mineurs touchent moins que les adultes.
Mais cette idée n’est pas nouvelle: en Alaska par exemple, elle a été mise en place
par l’Alaska Permanent Fund dont le capital repose sur 25% des revenus miniers et
pétroliers de l’Etat. Ainsi, toute personne résidant en Alaska depuis plus de 5 ans touchait
en 2014 plus de 1800 dollars. Il serait dangereux de considérer le revenu de base comme
simplement une mesure économique. Le revenu de base est bien plus que ça: il s’agit
d’un projet de société. Si l’on offrait une certaine somme fixe tous les mois à chaque
citoyen, cela changerait leur mode de vie. De nombreuses interrogations se posent sur de
nombreux niveaux différents. Un débat est alors apparu sur la scène politique et
médiatique : le revenu de base est-il une solution au chômage de masse actuel ou le
début d’un monde d’assistés ?



<hr>
<p style="font-size:11px;" ><a name="note"></a> 1.  The future of employment: how susceptible are jobs to computerisation ? De Carl Benedikt Frey 
1 and Michael A. Osborne : http://www.oxfordmartin.ox.ac.uk/downloads/academic/
The_Future_of_Employment.pdf
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
