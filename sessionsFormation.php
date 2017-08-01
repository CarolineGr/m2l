<?php
include_once '_gestionFonction.php';
include_once 'authentification.inc.php';

include 'header.inc.php';


if(isset($_GET["idSession"])){
    $idSession = $_GET["idSession"];
}

?>

 <!-- Services Section -->
    <!--<section id="services">-->
        <!--<div class="container">-->
            <!--en-tête-->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php $listeFormations = listeFormations();
                    foreach($listeFormations as $formation){
                        // sélection de la formation correspondant à la session précédemment sélectionnée
                        if($formation["idFormation"] == $idSession){
                            $_SESSION["idFormation"] = $formation["idFormation"];
                    ?>
                    <h2 class="section-heading"><?php echo $formation["titre"]; ?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $formation["descriptif"]; ?></h3>
                </div> 
                <?php } }?>
            </div>
        
            <!--Affichage des sessions-->
            <div class="row text-center">
                <div class="col-md-offset-1 col-md-10">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-mortar-board fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
            </div>
            
            <form action="sessionFormation.traitement.php" method="post">
                <div class="row">                    
                    <?php 
                    $listeSessions = listeSessions($_SESSION["idFormation"]); 
                    for($i=0;$i<count($listeSessions);$i++){
                    $session = $listeSessions[$i];
                    
                        // vérification si la date d'inscription à la formation n'est pas passée
                        if(strtotime($session["dateLimiteInsc"]) > strtotime(date("Y-m-d H:i:s"))){ 
                            if($i%2==0){
                            ?>
                            <div class="col-md-offset-2 col-md-4">
                                <h4 class="service-heading">N° de session : <?php echo $session["idSession"]; ?></h4>
                                <p>Date et horaire de début : <?php echo $session["dateDebut"]; ?></p>
                                <p>Date et horaire de fin : <?php echo $session["dateFin"]; ?></p>
                                <p>Date limite d'inscription : <?php echo $session["dateLimiteInsc"]; ?></p>
                                <p>Salle : <?php echo $session["salle"]; ?></p>
                                <p>Intervenant : <?php echo $session["nom"]. " ".$session["prenom"]; ?></p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="<?php echo $session["idSession"]; ?>" name="choixSession"> <span class="italique">S'inscrire à cette session de formation</span>
                                    </label>
                                </div>                         
                            </div>
                            <?php }else{ ?>
                            <div class="col-md-offset-1 col-md-4">  
                                <h4 class="service-heading">N° de session : <?php echo $session["idSession"]; ?></h4>
                                <p>Date et horaire de début : <?php echo $session["dateDebut"]; ?></p>
                                <p>Date et horaire de fin : <?php echo $session["dateFin"]; ?></p>
                                <p>Date limite d'inscription : <?php echo $session["dateLimiteInsc"]; ?></p>
                                <p>Salle : <?php echo $session["salle"]; ?></p>
                                <p>Intervenant : <?php echo $session["nom"]. " ".$session["prenom"]; ?></p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="<?php echo $session["idSession"]; ?>" name="choixSession"> <span class="italique">S'inscrire à cette session de formation</span>
                                    </label>
                                </div>                         
                            </div>
                    <?php } } } ?>                         
                </div> 
                
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <br>
                        <br>
                        <div>
                            <button type="submit" name="annuler" class="btn btn-warning">Annuler</button>
                            <button type="submit" name="valider" class="btn btn-warning">Valider</button>
                        </div>

                    </div>
                </div>
            </form>
  
<?php include 'footer.inc.php'; ?>
