<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ETIC 16 - L'historique </title>

  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/timeline.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php $page = timeline ?>

  <div class="container" >

    <!-- Static navbar -->
    <?php include("nav_bar.php"); ?>
    <!-- /. nav -->
 
	
	<section class="col-xs-12" style="text-align:justify;">
	<h2> L'histoire du revenu de base en France. </h2>
	<p>
	Afin de vous présenter l'histoire du revenu de base en France, nous avons choisi d’exposer les différents acteurs français qui ont fait vivre cette idée. Revivez donc l’histoire du revenu de base à travers notre frise chronologique dynamique. Les acteurs sont présentés sur deux axes, un qui distingue les positions entre droite et gauche, et un autre qui distingue les propositions selon leur plus ou moins grand pouvoir de changement sociétal.
	</p>
	</section>

       <!-- time line start -->
       <div id="timeline-widget" class="col-xs-12" style="min-width:720px;">  
       </div>
       <!-- time line end -->

  </div><!-- /.container -->

   <!-- footer -->
   <?php include("footer.php"); ?>


<div class="device-xs visible-xs"></div> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.12.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>  

<!-- script contenant la gestion de la timeline -->
<script src="js/timeline.js"></script> 
<!-- mise en place de la timeline -->
<script type="text/javascript"> 
  var frise_div = $("#timeline-widget"); 
  <?php 

  include 'outils/fcts.php';

  $data_tmp = loadData("data/timeline_acteurs_fr.csv");

  $data = "[ "; 
  foreach ($data_tmp as $line) {
    $data = $data." [ ";
      foreach ($line as $col) {
        $data = $data.' "'.addslashes ($col).'" ,';
      }
    $data = $data." ] ,";
  }
  $data = $data." ];";
  
  echo 'var data = '.$data;

  ?> 
  var frise = new timeline(data,frise_div[0]);
</script>  

</body>
</html>
