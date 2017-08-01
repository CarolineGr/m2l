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
                        <a class="page-scroll" href="accueil.php#page-top">Accueil</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="profil.php">Mon profil <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="menuDeroulant"><a class="page-scroll" href="#info">Mes informations</a></li>
                            <li class="menuDeroulant"><a class="page-scroll" href="#mdp">Changer mon mot de passe</a></li>
                            <li class="menuDeroulant"><a class="page-scroll" href="#suivi-formation">Mon suivi de formation</a></li>
                            <li class="menuDeroulant"><a class="page-scroll" href="#quitter-site">Se désinscrire du site</a></li>
                        </ul>
                    </li>
                    <li>
                       <a class="page-scroll" href="accueil.php#about">Nos formations</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="accueil.php#team">L'équipe</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="deconnexion.php">Déconnexion</a>
                    </li>
                </ul>
            </div>            
        </div>       
    </nav>

    <!-- Header -->
    <header class="header2">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Bienvenue sur le site de la Maison des Ligues</div>
            </div>
        </div>
    </header>
    
    <!--1ère partie gestion information de profil--> 
    <section id="info">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 text-center">
                    <h2 class="section-heading">Mes informations</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-offset-1 col-md-4">
                    <form action="profil.traitement.php" method="POST">
                    <div class="form-group row">
                        <!--Pour pré-remplir les champs avec les informations de profil de la BDD-->
                        <?php
                        $infoProfil = getProfil($_SESSION["user"]);
                        $idAssociation = $infoProfil[0]["idAssociation"];
                        $idPersonnel = $infoProfil[0]["idPersonne"];
                        foreach($infoProfil as $elements){                        
                        ?>
                        <label for="identifiant" class="col-2 col-form-label">Identifiant</label> 
                        <div class="col-10">                           
                            <input class="form-control" type="text" id="identifiant" name="login" value="<?php echo $elements["login"]; ?>" readonly="">                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nom" class="col-2 col-form-label">Nom</label> 
                        <div class="col-10">                           
                            <input class="form-control" type="text" id="nom" name="nom" value="<?php echo $elements["nom"]; ?>" required="" pattern="^[a-zA-Z]{1,45}$">                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prenom" class="col-2 col-form-label">Prénom</label> 
                        <div class="col-10">                           
                            <input class="form-control" type="text" id="prenom" name="prenom" value="<?php echo $elements["prenom"]; ?>" required="" pattern="^[a-zA-Zéèàïüäëöâêîôû]{1,45}$">                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fonction" class="col-2 col-form-label">Fonction</label> 
                        <div class="col-10">  
                            <select class="form-control" required="" name="fct">
                                <option value="<?php echo $elements["fonction"]; ?>"  selected=""><?php echo $elements["fonction"]; ?></option>
                                <?php 
                                $fonction = getFonctionInfo(); 
                                $listeFonction = listEnumFonction($fonction);
                                foreach ($listeFonction as $fct){                                  
                                ?>
                                <option value="<?php echo $fct ?>"><?php echo $fct ?></option>
                                <?php } ?>
                            </select>                                                            
                        </div>
                        </div> 
                    <div class="form-group row">
                        <label for="association" class="col-2 col-form-label">Association</label> 
                        <div class="col-10">  
                            <select class="form-control" required="" name="assoc">
                                <?php
                                $association = getAssociation($idAssociation);                                
                                ?>
                                <option value="<?php echo $association['idAssociation']; ?>"><?php echo $association["nom"]; ?></option>
                                <?php 
                                $lesAssociation = listeAssociations(); 
                                foreach ($lesAssociation as $association){                                  
                                ?>
                                <option value='<?php echo $association["idAssociation"]; ?>'><?php echo $association["nom"]; ?></option>
                                <?php } ?>
                            </select>                                                        
                        </div> 
                    </div>
                </div>
               
                <div class="col-md-offset-2 col-md-4">
                    <div class="form-group row">
                        <label for="adresse" class="col-2 col-form-label">Adresse</label> 
                        <div class="col-10">                           
                            <input class="form-control" type="text" id="adresse" name="adresse" required="" value="<?php echo $elements["adresse"]; ?>" pattern="#^[a-zA-Z0-9]{1,45}+$#">                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="codePostal" class="col-2 col-form-label">Code postal</label> 
                        <div class="col-10">                           
                            <input class="form-control" type="text" id="codePostal" name="cp" required="" value="<?php echo $elements["codePostal"]; ?>" pattern="^[0-9]{1,45}$">                          
                        </div>
                    </div>
               
                    <div class="form-group row">
                        <label for="email" class="col-2 col-form-label">Email</label> 
                        <div class="col-10">                           
                            <input class="form-control" type="email" id="email" name="email" value="<?php echo $elements["email"]; ?>" required="">                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tel" class="col-2 col-form-label">Téléphone</label> 
                        <div class="col-10">                           
                            <input class="form-control" type="text" id="tel" name="tel" value="<?php echo $elements["tel"]; ?>" required="" pattern="^[0-9]{1,45}$">
                        </div>
                    </div>

                </div> <?php } ?>
                
                <!--boutons de validation-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <!--<button type="submit" name="annuler" class="btn btn-primary">Annuler</button>-->
                        <button type="submit" name="valider" class="btn btn-primary">Valider les modifications</button>                    
                    </div>
                </div>
                <br>
                </form>
            </div>        
        </section>                      
        
        <!--1ère partie BIS gestion changement de mot de passe --> 
        <section id="mdp">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6 text-center">
                        <h2 class="section-heading">Changer mon mot de passe</h2>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <form action="profil.traitement.php" method="POST">
                            <div class="form-group row text-center">
                                <label for="mdp" class="col-2 col-form-label">Nouveau mot de passe</label> 
                                <div class="col-6">                           
                                    <input class="form-control" type="password" id="mdp" name="mdp" value="" required="">                        
                                </div>
                            </div>
                            <div class="form-group row text-center">
                                <label for="mdp" class="col-2 col-form-label">Confirmation du nouveau mot de passe</label> 
                                <div class="col-6">                           
                                    <input class="form-control" type="password" id="mdp" name="mdpc" value="" required="">                        
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="chgmtMdp" class="btn btn-primary">Valider la modification</button>                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
        <!--2ème partie suivi de formation-->
        <section id="suivi-formation">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6 text-center">
                        <h2 class="section-heading">Mon suivi de formation</h2>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <!--sessions où le bénévole est inscrit-->
                    <div class="col-md-offset-1 col-md-4">
                        <h5 class="section-heading">Vos inscriptions aux formations</h5> 
                        <br>
                    </div>
                                            
                    <!--historique des sessions-->
                    <div class="col-md-offset-2 col-md-4">
                        <h5 class="section-heading">L'historique de vos formations</h5>
                        <br>
                    </div>
                </div>
                
                <div class="row">
                    <!--sessions où le bénévole est inscrit-->
                    <div class="col-md-offset-1 col-md-5 text-left">
                    <?php
                    // récupération des sessions où le bénévole s'est inscrit
                    $inscriptionsFormations = getInscriptionSessions($idPersonnel);
                    foreach ($inscriptionsFormations as $inscriptionFormation):
                        // tri en fonction de la date de formation
                        if(strtotime($inscriptionFormation["dateDebut"]) > strtotime(date("Y-m-d H:i:s"))):
                    ?>
                    
                        <p class="gras"><?php echo $inscriptionFormation["titre"]; ?> :</p>
                        <p><?php echo $inscriptionFormation["descriptif"]; ?></p>
                        <p>Session du <?php echo $inscriptionFormation["dateDebut"]; ?> au <?php echo $inscriptionFormation["dateFin"]; ?></p>
                        <a href="profil.traitement.php?session=<?php echo $inscriptionFormation["idSession"]; ?>"><span class="italique">Se désinscrire de cette formation</span></a>                      
                        <br>
                        <br>
                    <?php 
                    endif;
                    endforeach; 
                    ?>
                    </div>
                        
                    <!--historique des sessions passées-->
                    <div class="col-md-offset-1 col-md-5 text-left">    
                    <?php
                    foreach ($inscriptionsFormations as $inscriptionFormation):
                        // tri en fonction de la date de formation
                        if(strtotime($inscriptionFormation["dateDebut"]) < strtotime(date("Y-m-d H:i:s"))):
                    ?>                    
                        <p class="gras"><?php echo $inscriptionFormation["titre"]; ?> :</p>
                        <p><?php echo $inscriptionFormation["descriptif"]; ?></p>
                        <p>Session du <?php echo $inscriptionFormation["dateDebut"]; ?></p>
                        <br>
                        <br> 
                    <?php
                    endif;
                    endforeach;
                    ?>
                    </div>                    
                </div>
            </div>        
        </section>    
        
        <!-- 3ème partie se désinscrire du site -->   
        <section id="quitter-site"> 
            <div class="container">
                <form action="profil.traitement.php" method="POST">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6 text-center">
                            <h2 class="section-heading">Me désinscrire du site de la maison des ligues de Lorraine</h2>
                            <p class="">Vous ne faites plus partie des bénévoles de l'association et voulez vous désinscrire de ce site ?</p>
                            <button type="submit" name="desinscriptionSite" id="desinscriptionSite" class="btn btn-danger">Je souhaite me désinscrire du site.</button>                    
                        </div>  
                    </div>
                </form>
            </div>        
        </section>
            
            
    </div>


   
    <?php include 'footer.inc.php'; ?>