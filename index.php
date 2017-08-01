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
                        <a class="page-scroll" href="#services">Me connecter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Découvrez le site de la Maison des Ligues</div>
                <div class="intro-descriptif">La Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au Comité Régional Olympique et Sportif de Lorraine (CROSL).</div>
            </div>
        </div>
    </header>

    <!-- Section authentification/inscription sur le site-->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-lg-4 text-center">
                    <h2 class="section-heading">Devenir membre</h2>
                    <h3 class="section-subheading text-muted">Veuillez remplir le formulaire ci-dessous.</h3>
                </div>
            
                <div class="col-md-offset-2 col-lg-4 text-center">
                    <h2 class="section-heading">On se connait déjà ?</h2>
                    <h3 class="section-subheading text-muted">Veuillez saisir vos identifiants.</h3>
                </div>
            </div>
            
            <div class="row">
                <form  method="post" action="index.traitement.php">
                    <div class="col-md-offset-1 col-md-4">
                        <div class="form-group row">
                            <label for="nom" class="col-2 col-form-label">Nom*</label> 
                            <div class="col-10">                           
                                <input class="form-control" type="text" id="nom" name="nom" required="" pattern="^[a-zA-Z0-9]{1,45}$">                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prenom" class="col-2 col-form-label">Prénom*</label> 
                            <div class="col-10">                           
                                <input class="form-control" type="text" id="prenom" name="prenom" required="" pattern="^[a-zA-Zéèàïüäëöâêîôû]{1,45}$">                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fonction" class="col-2 col-form-label">Fonction</label> 
                            <div class="col-10">  
                                <select class="form-control" name="fonction" required="">
                                    <option value=""></option>
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
                                <select class="form-control" name="association" required="">
                                    <option value=""></option>
                                    <?php 
                                    $lesAssociation = listeAssociations(); 
                                    foreach ($lesAssociation as $association){                                  
                                    ?>
                                    <option value='<?php echo $association["idAssociation"]; ?>'><?php echo $association["nom"] ?></option>
                                    <?php } ?>
                                </select>                                                        
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label for="adresse" class="col-2 col-form-label">Adresse</label> 
                            <div class="col-10">                           
                                <input class="form-control" type="text" id="adresse" required="" name="adresse" pattern="#^[a-zA-Z0-9]{1,45}+$#">                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="codePostal" class="col-2 col-form-label">Code postal</label> 
                            <div class="col-10">                           
                                <input class="form-control" type="text" id="codePostal" required="" name="codePostal" pattern="^[0-9]{1,45}$">                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-2 col-form-label">Email*</label> 
                            <div class="col-10">                           
                                <input class="form-control" type="email" id="email" name="email" required="">                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-2 col-form-label">Téléphone*</label> 
                            <div class="col-10">                           
                                <input class="form-control" type="text" id="tel" name="tel" required="" pattern="^[0-9]{1,45}$">                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="identifiant" class="col-2 col-form-label">Identifiant*</label> 
                            <div class="col-10">                           
                                <input class="form-control" type="text" id="identifiant" name="user" required="" pattern="^[a-zA-Z0-9éèàïüäëöâêîôû]{1,45}$">                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mdp" class="col-2 col-form-label">Mot de passe*</label> 
                            <div class="col-10">                           
                                <input class="form-control" type="password" id="mdp" name="mdp" required="" pattern="^[a-zA-Z0-9éèàïüäëöâêîôû]{1,45}$">                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mdp" class="col-2 col-form-label">Confirmation du mot de passe*</label> 
                            <div class="col-10">                           
                                <input class="form-control" type="password" id="mdp" name="mdpc" required="" pattern="^[a-zA-Z0-9éèàïüäëöâêîôû]{1,45}$">                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <p>* Informations obligatoires</p>
                        </div>
                        <div class="form-group row">
                            <button type="submit" name="valider" class="btn btn-primary">Valider</button>
                        </div>
                    </div> 
                </form>
                        
                <div class="col-md-offset-2 col-md-4">
                    <div class="card card-container">
                        <div class="col-md-offset-3">
                            <img id="profile-img" class="profile-img-card" src="img/imgProfil.png" />
                        </div>
                        <br>
                        <p id="profile-name" class="profile-name-card"></p>
                        <form class="form-signin" method="post" action="accueil.php">
                            <span id="reauth-email" class="reauth-email"></span>
                            <input type="text" id="user" class="form-control" name="user" placeholder="Identifiant" required autofocus>
                            <br>
                            <input type="password" id="mdp" class="form-control" name="mdp" placeholder="Mot de passe" required>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block btn-signin" name="meco" value="" type="submit">Me connecter</button>
                        </form><!-- /form -->
                        <a href="#" class="forgot-password">
                            Mot de passe oublié ?
                        </a>
                    </div>
                </div>
            </div>            
        </div> <!--container-->
    </section>

<?php include_once 'footer.inc.php'; ?>