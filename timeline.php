<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ETIC 16 - Timeline</title>

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
	<h3> L'histoire du revenue de base en France. </h3>
	<p>
	Afin de vous présenter l'histoire du revenu de base en France, nous avons choisi de vous exposer les différents acteurs français qui ont fait vivre cette idée. 
	</p>
	</section>

       <!-- time line start -->
       <div id="timeline-widget" class="col-xs-12">
 
         
  
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
<script src="js/ResizeSensor.js"></script> 
<script src="js/timeline.js"></script> 
<script type="text/javascript"> 
  frise_div = $("#timeline-widget");

  <?php 

  include 'outils/fcts.php';

  $data_tmp = loadData("https://docs.google.com/spreadsheets/d/1qNfddHEXgC4QFCX1ScKmoVNRTUV75AKHZaZG0OxAae0/pub?gid=1276158443&single=true&output=csv");

  //echo "/*\n";
  //print_r($data_tmp);
  //echo "\n*/";

  $data = "";

  $data = $data." [ ";

  foreach ($data_tmp as $line) {
    $data = $data." [ ";
      foreach ($line as $col) {
        $data = $data.' "'.addslashes ($col).'" ,';
      }
    $data = $data." ] ,";
  }
    $data = $data." ];";
  
  echo 'var data = '.$data.'';

  ?>

  var frise = new timeline(data,frise_div[0]);
</script>  

</body>
</html>
