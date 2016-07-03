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
	<h2>  Qu’est-ce qu’une controverse ? </h2>
	<p>
   « Une controverse est une discussion argumentée, engendrée par l'expression d'une différence d'opinion ou d'une critique quant à un problème, un phénomène ou un état de choses » (Wikipédia.fr). Tommaso Venturini, du Medialab de Sciences Po, affirme qu’une controverse est une « incertitude partagée ». La sociologie des controverses se penche alors sur l’étude des positions souvent irréconciliables qui voient s’opposer des acteurs hétérogènes autour d’un sujet. Ce qu’il importe en conséquence d’étudier et de chercher à préciser, c’est la manière dont ces acteurs interagissent et s’affrontent pour parvenir, à travers des rapports de force et de polémiques argumentées, à la clôture de la controverse.
	</p>
	<p>
	Dans le cadre de la controverse du revenu de base, il a fallu dans un premier temps effectuer une recherche dans les bases de données de la presse, afin de repérer les positions des acteurs telles qu’elles ont été relayées par des journalistes ou par les acteurs eux-mêmes : cela a été le rôle du journaliste et de l’explorateur web de l’équipe. Il a ensuite fallu cartographier les acteurs en présence, ainsi que leurs positions dans le débat. Mais l’étude d’une controverse ne s’arrête pas là : l’aspect juridique de la question a été traitée par l’un des membres de l’équipe dans une page à part.
	</p>
	<p>
	Le travail effectué sur le revenu de base nous a permis de nous rendre compte de la complexité et des retombées que peut avoir un différend public de caractère intellectuel et politique. En effet, l’instauration d’un revenu de base n’aurait pas qu’un impact économique : une partie de notre arbre de débats ici-bas essaie précisément de restituer certains des changements imaginés d’un revenu universel sur la société. C’est une proposition qui concernerait tous les citoyens et qui bouleverserait le mode de vie de chacun d’entre nous. Puisque le travail de cartographie d’une controverse est censé être le plus équilibré et impartial possible, nous vous invitons à explorer notre site pour que vous puissiez développer votre propre opinion sur le sujet. Bonne lecture !
	</p>
	
	</section>

	<section class="col-xs-12">
	<h2>  Où en est le débat actuellement ? </h2>
	</section>
      <?php 

      include 'outils/fcts.php';

      $data_tmp = loadData("data/graph_arbre_debat.csv");
 
 
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

              $width_centerer = (12-$width*$nb_elmt)/12;
              $width_centerer = $width_centerer/($nb_elmt-1);

              


              for ($i=5; $i+2 < count($line) && $line[$i+2]!=""; $i+=3) { 

                ?>



              <div class="col-xs-<?php echo  $width; ?> graph_big_parts" style="width:<?php echo  (100/$nb_elmt); ?>%;">
                <div class="col-xs-12 vertical-line"></div>
                <div class="col-xs-12 titre-debat" style="background-color: <?php echo $line[$i+1]; ?> ;" <?php

              echo 'onclick="show_part(\''.$line[1]."','".$line[$i+2]."');\"";

               ?> > <span><?php echo $line[$i]; ?></span> </div>
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
                    <?php for ($i=6; $i+2 < count($line) && $line[$i+2]!=""; $i+=3) {  ?> 
                      <section class="citation">
                      <img class="citation-img" src="<?php echo $line[$i+1];?>" alt=""/>
                      <p><b> <?php echo $line[$i];?> : </b> <?php echo $line[$i+2];?> </p>  
                      </section>
                    <?php   }  ?>
                  </div>

              </div>

              <?php
          }
      } ?>

	<div class="col-xs-12" style="height:250px;"></div>

       <!-- footer -->
       <?php include("footer.php"); ?> 

  </div><!-- /.container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type='text/javascript'  src="js/jquery-1.12.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>   
    <!-- script premettant la navigation dans l'arbre -->
    <script src="js/debats.js"></script>   

    <script>
      hide_all();
      show_part(null,"graph-main");
    </script>
 
</body>
</html>
