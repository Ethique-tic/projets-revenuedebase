<?php

switch ($page) {

  case acceuil:
    $page_active = acceuil;
    break;

  case timeline:
    $page_active = timeline;
    break;

  case debates:
    $page_active = debates;
    break;

  case us:
    $page_active = us;
    break;

  case Juridique:
    $page_active = Juridique;
    break;
  
}


?>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><small>ETIC G12</small></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

     <ul class="nav navbar-nav">
        <li <?php if ($page_active == acceuil) {?> class="active" ><a href="#"> <?php } else { ?> ><a href="index.php">  <?php } ?> Accueil</a></li>
        <li <?php if ($page_active == debates) {?> class="active" ><a href="#"> <?php } else { ?> ><a href="debats.php"> <?php } ?> Le débat </a></li>
        <li <?php if ($page_active == timeline) {?> class="active" ><a href="#"> <?php } else { ?> ><a href="timeline.php"> <?php } ?> L'histoire </a></li>
        <li <?php if ($page_active == Juridique) {?> class="active" ><a href="#"> <?php } else { ?> ><a href="juridique.php"> <?php } ?> L'aspect juridique </a></li>
        <li <?php if ($page_active == us) {?> class="active" ><a href="#"> <?php } else { ?> ><a href="us.php"> <?php } ?> Qui sommes nous ? </a></li>
      </ul>

    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>
<!-- /. nav -->


<section class="page-header" >
    <h1 style="font-size:20px;"  >Un revenu de base pour tous comme solution au chômage de masse ?</h1>
</section>
