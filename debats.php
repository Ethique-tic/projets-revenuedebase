<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ETIC 16 - Arbres des débats</title>

  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/graph.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
</head>
<body>

<?php $page = debates ?>

  <div class="container">

    <!-- Static navbar -->
    <?php include("nav_bar.php"); ?>
    <!-- /. nav -->
 

	<section class="col-xs-12" style="text-align:justify;">
	<h3>  Qu’est-ce qu’une controverse ? </h3>

   <p>Une controverse est une discussion argumentée, engendrée par l'expression d'une différence d'opinion ou d'une critique quant à un problème, un phénomène ou un état de choses. Tommaso Venturini affirme qu’une controverse est en fait une « incertitude partagée ». En d’autres termes, la seule certitude dont l’on dispose, quand on étudie une controverse, c’est qu’il existe, sur un sujet donné, un désaccord et des positions souvent irréconciliables. Ce qu’il importe en conséquence d’étudier et de chercher à préciser, c’est la manière dont les acteurs interagissent et s’opposent pour construire cette incertitude fondamentale et la polémique qui en découle.</p>

   <p> C’est pourquoi l’étude d’une controverse est un travail empirique, qui s’appuie sur des faits actuels ou passé, et principalement un travail de recherche. Dans le cadre de la controverse du revenu de base, il a fallu dans un premier temps relever tous les médias, sites web etc. participant au débat, c’était là le rôle du journaliste de l’équipe. Il a ensuite fallu distinguer tous les acteurs et les différentes positions prises dans le débat, pour ensuite tenter d’identifier les liens qui existaient entre ces derniers. Mais l’étude d’une controverse ne s’arrête pas, c’est tout l’aspect juridique de la question qui a été traité par l’un des membres de l’équipe. </p>

    <p>Le travail effectué sur le revenu de base nous a permis de nous rendre compte de la la complexité d’un débat. L’instauration d’un revenu de base n’a en effet pas qu’un impact économique: il s’agit d’un projet de société tant les conséquences dans divers domaines seraient nombreuses. C’est une proposition qui concernent tous les citoyens et qui bouleversera le mode de vie de chacun d’entre nous.</p>
	</section>

	<section class="col-xs-12">
	<h3>  Où en est le débat actuellement ? </h3>
	</section>
      <?php 

      include 'outils/fcts.php';

      $data_tmp = loadData("https://docs.google.com/spreadsheets/d/1QOUEtVo-ECMLklFv4O5iQAgw_yu3TA_qtK3Gm78cZjM/pub?gid=1434001928&single=true&output=csv");
 
 
      foreach ($data_tmp as $line) { 

          if($line[0]=='graph')
          {
              ?>
              <div class="col-xs-12 graph-page" id = "<?php echo $line[1]; ?>">

              <?php
              if($line[2]!="null" && $line[2]!="")
              {
              ?>
              <img src="img/arrow_up.svg" alt="arrow up - top menu" class="detail-arrow-up"  <?php

              echo 'onclick="show_part(\''.$line[1]."','".$line[2]."');\"";

               ?> />


              <?php
              }
              ?>

              <div class="col-xs-12 grand-titre-debat"  > 
                <h3 style="background-color: <?php echo $line[4]; ?> ;" > <?php echo $line[3]; ?> </h3>
              </div> 

              <?php
              //comptage :
              $nb_elmt = 0;
              for ($i=5; $i+2 < count($line) && $line[$i+2]!=""; $i+=3) 
                {$nb_elmt++;}

              $width = 12.0/$nb_elmt;
              $width = floor($width);

              $width_centerer = 0.5*(12-$width*$nb_elmt)/12;

              if($width_centerer>0)
              {
                ?>

                <div class="col-xs-1" style="width:<?php echo ($width_centerer*100)."%";?>;"></div>

                <?php
              }


              for ($i=5; $i+2 < count($line) && $line[$i+2]!=""; $i+=3) { 

                ?>



              <div class="col-xs-<?php echo  $width; ?> graph_big_parts">
                <div class="col-xs-12 vertical-line"></div>
                <div class="col-xs-12 titre-debat" style="background-color: <?php echo $line[$i+1]; ?> ;" <?php

              echo 'onclick="show_part(\''.$line[1]."','".$line[$i+2]."');\"";

               ?> > <?php echo $line[$i]; ?> </div>
              </div>

                <?php

              }
              ?>



            </div>



              <?php

          }
          else if($line[0]=='data')
          { 

              ?>
                <div class="col-xs-12 texte-debat graph-page" id = "<?php echo $line[1]; ?>">
                  <img src="img/arrow_up.svg" alt="arrow up - top menu" class="detail-arrow-up" <?php

                  echo 'onclick="show_part(\''.$line[1]."','".$line[2]."');\"";

                   ?>/>
                  <div class="col-xs-12 titre-debat grand-titre-debat">
                    <h3 class="titre-debat-societe" style="background-color: <?php echo $line[4]; ?> ;"> <?php echo $line[3]; ?> </h3>
                  </div>

                  <div class="col-xs-12" style="text-align:justify;">
		
		<p> <?php echo $line[5];?> </p>
		
<?php
              for ($i=6; $i+1 < count($line) && $line[$i+1]!=""; $i+=2) { 

                ?>
		<p> <b> <?php echo $line[$i];?> : </b> <?php echo $line[$i+1];?> </p>
<?php 
}
?>
                  </div>

              </div>

              <?php
          }
      } 
       

      ?>


       <!-- footer -->
       <?php include("footer.php"); ?>


  </div><!-- /.container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type='text/javascript'  src="js/jquery-1.12.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>   

    <script src="js/debats.js"></script>   

    <script>
      hide_all();
      show_part(null,"graph-main");
    </script>
 
</body>
</html>
