<?php session_start(); 
include_once '_gestionFonction.php';


if(isset($_POST["valider"])){
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['fonction']) && isset($_POST['association']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['user']) && isset($_POST['mdp']) && isset($_POST['mdpc'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $fonction = $_POST['fonction'];
        $idAssociation = $_POST['association'];
        $adresse = $_POST['adresse'];
        $codePostal = $_POST['codePostal'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $login = $_POST['user'];
        $mdpc = $_POST['mdpc'];
        $mdp = $_POST['mdp'];
        
        if($mdp != $mdpc){
            ?>
            <script language="javascript">
                alert("Les deux mots de passe ne sont pas identiques, veuillez recommencer votre inscription");
                history.back();
            </script>
            <?php 
        }else{
            $mdp = encrypt($_REQUEST['mdp'],$saltCryptage);
        
            $reussi = inscriptionSite($nom,$prenom,$idAssociation,$fonction,$adresse,$codePostal,$email,$tel,$login,$mdp);
            if($reussi){
                $_SESSION["user"] = $login;
                $_SESSION["mdp"] = $mdp;
            }
            header("Location: accueil.php");
        }
    }else{
         ?>
        <script language="javascript">
            alert("Une erreur s'est produite, vous allez être redirigé vers l'accueil...");
            window.location.href='index.php#services';
        </script>
        <?php
    }
}elseif(isset($_POST["meco"])){
    header("Location: accueil.php");
}else{
    header("Location: index.php");
}