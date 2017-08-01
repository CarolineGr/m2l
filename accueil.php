<?php 
include_once '_gestionFonction.php';
include_once 'authentification.inc.php';
include_once 'header.inc.php';
?>


<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">La maison des ligues de Lorraine</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#page-top">Accueil</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Nos formations</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">L'équipe</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="profil.php">Mon profil</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="deconnexion.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Bienvenue sur le site de la Maison des Ligues</div>
            </div>
        </div>
    </header>

    <!-- Section Nos Formations --> 
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Nos formations</h2>
                    <h3 class="section-subheading text-muted">Sélectionnez une formation pour consulter les sessions disponibles.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <?php 
                        $listeFormations = listeFormations();
                        for($i=0;$i<count($listeFormations);$i++){
                            $formation = $listeFormations[$i]; 
                            // pour faire apparaitre en alternance droite et gauche
                            if($i%2==0){
                        ?>
                        
                        <!--affichage des formations-->
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/<?php echo $formation["image"] ;?>">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><?php echo $formation["titre"] ;?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?php echo $formation["descriptif"] ;?></p>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><a href="sessionsFormation.php?idSession=<?php echo $formation["idFormation"] ;?>">Consultation des sessions de cette formation.</a></p>
                                </div>
                            </div>
                        </li>
                        <?php }else{ ?>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/<?php echo $formation["image"] ;?>">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading"><?php echo $formation["titre"] ;?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?php echo $formation["descriptif"] ;?></p>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><a href="sessionsFormation.php?idSession=<?php echo $formation["idFormation"] ;?>">Consultation des sessions de cette formation.</a></p>
                                </div>
                            </div>
                        </li>
                        <?php }} ?>
                        </li>                       
                    </ul>
                </div>
            </div>
        </div>
    </section>

     <!-- Section équipe--> 
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Notre équipe</h2>
                    <h3 class="section-subheading text-muted">Notre équipe de développeur à votre service.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/caro.jpg" class="img-responsive img-circle" alt="">
                        <h4>Caroline Grimault</h4>
                        <p class="text-muted">Developpeuse</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/laszlo2.jpg" class="img-responsive img-circle" alt="">
                        <h4>Laszlo Varga</h4>
                        <p class="text-muted">Développeur</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/casper.jpg" class="img-responsive img-circle" alt="">
                        <h4>Chris G.</h4>
                        <p class="text-muted">Développeur</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
<!--            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>-->
        </div>
    </section>

<?php include_once 'footer.inc.php'; ?>