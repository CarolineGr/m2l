<?php 
include_once '_gestionFonction.php';
include_once 'authentification.inc.php';

echo "<meta charset='utf-8'>";

// Désinscription du site de la maison des ligues
if(isset($_POST["desinscriptionSite"])){
    desinscriptionSite($_SESSION["user"]);
    ?>
    <script language="javascript">
        alert("Votre demande de désinscription du site de la maison des ligues de Lorraine a été prise en compte");
        window.location.href='index.php';
    </script>
    <?php
    exit();

   
// modification profil
}elseif(isset($_POST["valider"])){
    if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["fct"]) && isset($_POST["assoc"]) && isset($_POST["adresse"]) && isset($_POST["cp"]) && isset($_POST["tel"]) && isset($_POST["email"])){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $fonction = $_POST["fct"];
        $idAssociation = $_POST["assoc"];
        $adresse = $_POST["adresse"];
        $codePostal = $_POST["cp"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $login = $_SESSION["user"];

        majProfil($nom,$prenom,$idAssociation,$fonction,$adresse,$codePostal,$email,$tel,$login);
        header("Location:profil.php#info");
        exit();
    }else{
        ?>
        <script language="javascript">
            alert("Une erreur s'est produite lors de la modification de votre profil...");
            history.back();
        </script>
        <?php  
    }
    
// désinscription d'une session de formation    
}elseif(isset($_GET["session"])){
    if(isset($_GET["session"])){
        $idSession = htmlentities($_GET["session"]);
        desinscriptionFormation($idSession);
        header("Location:profil.php#suivi-formation");
        exit();
    }else{
        ?>
        <script language="javascript">
            alert("Une erreur s'est produite lors de votre désinscription de la formation...");
            history.back();
        </script>
        <?php  
    }
// validation du changement de mot de passe    
}elseif(isset($_POST["chgmtMdp"])){
    if(isset($_POST["mdp"]) && isset($_POST["mdpc"])){
        $mdp = $_POST["mdp"];
        $mdpc = $_POST["mdpc"];
        
        if($mdp != $mdpc){
             ?>
            <script language="javascript">
                alert("Les deux saisies ne sont pas identiques, veuillez recommencer.");
                history.back();
            </script>
            <?php 
            exit();            
        }else{
            $mdp = encrypt($mdp,$saltCryptage);
            changeMDP($_SESSION["user"],$mdp);
            ?>
            <script language="javascript">
                alert("Votre nouveau mot de passe est enregistré avec succès.");
                window.location.href='profil.php';
            </script>
            <?php
        }
    }else{
        ?>
        <script language="javascript">
            alert("Une erreur s'est produite lors du traitement, veuillez recommencer votre saisie");
            history.back();
        </script>
        <?php 
    }
        
        
        
        
        
 
// au cas où il y ait un problème avec un submit
}else{
    ?>
    <script language="javascript">
        alert("Une erreur s'est produite...");
        history.back();
    </script>
    <?php  
}