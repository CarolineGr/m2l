<?php session_start();

if (isset($_REQUEST["logout"])){
    session_unset();
}

if (isset($_REQUEST["user"]) && isset($_REQUEST["mdp"])) {
    //cryptage du mot de passe
    
    
//    $mdp = $_REQUEST["mdp"];
    $mdp = encrypt($_REQUEST['mdp'],$saltCryptage);
//    var_dump(encrypt($_REQUEST['mdp'],$saltCryptage));
    $resultat = verification($_REQUEST["user"], $mdp);
    
//    var_dump($resultat);
    
    if ($resultat == true) {
        $_SESSION["user"] = $_REQUEST["user"];
        $_SESSION["mdp"] = $mdp;
        header("Location: accueil.php");
    }else{
        header("Location: index.php");
    }
}
?>