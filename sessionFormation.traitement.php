<?php
include_once '_gestionFonction.php';
include_once 'authentification.inc.php';

echo "<meta charset='utf-8'>";

if(isset($_POST["annuler"])){
    header("Location:accueil.php#about");   
    exit();
}

if(isset($_POST["choixSession"])){
    $choixSession = htmlentities($_POST["choixSession"]);
    
    if(isset($_POST["valider"])){
        $idPersonnel = getIdPersonnel($_SESSION["user"]);
        inscriptionSession($idPersonnel, $choixSession);
        ?>
        <script language="javascript">
            alert("Votre inscription a bien été prise en compte !");
            window.location.href='accueil.php';         
        </script>
        <?php
    
    }else{
        ?>
        <script language="javascript">
            alert("Une erreur est survenue, veuillez recommencer.");
            history.back();
        </script>
        <?php    
    }
    
}else{
    ?>
    <script language="javascript">
        alert("Veuillez soit sélectionner une session, soit annuler ! ");
//         window.location.href='sessionsFormation.php?idSession=<?php $choixSession; ?>';
        history.back();
    </script>
    <?php 
}



