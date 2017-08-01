<?php

// gestionnaire de connexion à la BDD
function connexion() {
    $user = 'root';
    $pass = '';
    $hote = 'localhost';
    $port = '3306';
    $base = 'm2l_formation';
    
    $dsn="mysql:$hote;port=$port;dbname=$base";

    $pdo = null;
    try {
        $pdo = new PDO($dsn,$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
    } catch (PDOException $err) {
        $messageErreur = $err->getMessage();
        error_log($messageErreur, 0);
    }
    return $pdo;
}

// Vérification de l'identifiant et du mot de passe
function verification($user, $mdp) {
    $bool = false;
    $pdo = connexion();
    if ($pdo != false) {
        $sql = "SELECT count(*) as nb FROM personnelassociatif WHERE BINARY login=:user AND BINARY mdp=:mdp AND actif=1";
        $prep = $pdo->prepare($sql);
        $prep->bindParam(':user', $user, PDO::PARAM_STR);
        $prep->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $prep->execute();
        $resultat = $prep->fetch();
        if ($resultat["nb"] == 1) {
            $bool = true;
        }
        $prep->closeCursor();
    }
    return $bool;
}

// récupération de la liste énum du champ fonction de la table personnelAssociatif
function getFonctionInfo(){
    $resultat = false;
    $pdo = connexion();
    if($pdo != null){
        $sql = "SHOW COLUMNS FROM personnelassociatif LIKE 'fonction'";
        $pdoStatement = $pdo->query($sql);
        if($pdoStatement != false){
            $recordSet = $pdoStatement->fetch(PDO::FETCH_ASSOC);
            $resultat = $recordSet["Type"];
        }
    }
    return $resultat;
}

// séparation de la liste enum du champ fonction
function listEnumFonction($fonctionInfo){
    // récupérer la longueur de la chaine
    $len = strlen($fonctionInfo);
    
    // substring pour retirer les 5 premiers caractères + le dernier (-6 parce que 5+1)
    $chaine = substr($fonctionInfo, 5, $len-6);
    
    //fonction explode pour recupérer dans un tableau les chaines de caractère
    $liste = explode(",", $chaine);
    
    //boucle pour remplacer les " par une chaine vide pour chaque élément du tableau
    for($i=0;$i<count($liste);$i++){
        $fonction = $liste[$i];
        $temp = str_replace("'", "", $fonction);
        $liste[$i] = $temp;
    }
    
    // return le tableau de l'énumeration des fonctions
    return $liste;
}

// fonction de cryptage du mot de passe
$saltCryptage = '$5$rounds=5000$jdqVqZs65xs8q2xh$';

function encrypt($pure_string, $saltCryptage)
{
    $mdp = crypt($pure_string, $saltCryptage);
    return str_replace($saltCryptage, "", $mdp);
}

// récupération des associations
function listeAssociations(){
    $lesAssociations = array();
    $pdo = connexion();
    if($pdo != null){
        $sql = "SELECT idAssociation, nom FROM association ORDER BY nom";
        $pdoStatement = $pdo->query($sql);
        $lesAssociations = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $lesAssociations;
}

// récupération des formations
function listeFormations(){
    $lesFormations = array();
    $pdo = connexion();
    if($pdo != null){
        $sql = "SELECT idFormation, titre, descriptif, image FROM formation";
        $pdoStatement = $pdo->query($sql);
        $lesFormations = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $lesFormations;
}

// récupération des sessions
function listeSessions($idFormation){
    $lesSessions = array();
    $pdo = connexion();
    if($pdo != null){
        $sql = "SELECT * FROM sessionformation JOIN intervenant ON sessionformation.idIntervenant = intervenant.idIntervenant WHERE idFormation=:idFormation";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindParam(":idFormation",$idFormation);
        $pdoStatement->execute();
        $lesSessions = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $lesSessions;
}
    
// enregistrement d'une inscription à une session de formation dans la BDD
function inscriptionSession($idPersonne, $choixSession){
    $reussi = false;
    $pdo = Connexion();
    if ($pdo != false) {

        $req = "INSERT INTO inscription VALUES (:idPersonne, :choixSession)";
        
        $pdoStatement = $pdo->prepare($req);
        $pdoStatement->bindParam(":idPersonne", $idPersonne);
        $pdoStatement->bindParam(":choixSession", $choixSession);
        
        $pdoStatement->execute();
        $reussi = $pdoStatement->rowCount();
    }
    return $reussi;
}

// A partir du login, récupération de l'idPersonnel
function getIdPersonnel($login){    
    $pdo = connexion();
    if($pdo != null){
        $sql = "SELECT idPersonne FROM personnelassociatif WHERE login = :login";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindParam(":login", $login);
        $pdoStatement->execute();
        $idPersonnel = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $idPersonnel[0]['idPersonne'];    
}

// A partir du login, on récupère toutes les informations du profil personnel associatif
function getProfil($login){
    $pdo = connexion();
    if($pdo != null){
        $sql = "SELECT * FROM personnelassociatif WHERE login = :login";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindParam(":login", $login);
        $pdoStatement->execute();
        $idProfil = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $idProfil; 
}

// A partir de l'id de l'association, on récupère toutes les informations concernant l'association
function getAssociation($idAssoc){
    $pdo = connexion();
    if($pdo != null){
        $sql = "SELECT * FROM association WHERE idAssociation = :idAssoc";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindParam(":idAssoc", $idAssoc);
        $pdoStatement->execute();
        $infoAssoc = $pdoStatement->fetch();
    }
    return $infoAssoc; 
}

// A partir du nom de l'association, récupération de son id
function getIdAssociation($association){    
    $pdo = connexion();
    if($pdo != null){
        $sql = "SELECT idAssociation FROM association WHERE nom = :association";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindParam(":association", $association);
        $pdoStatement->execute();
        $idAssociation = $pdoStatement->fetch();
    }
    return $idAssociation['idAssociation'];    
}

// inscription sur le site de la maison des ligues de Lorraine
function inscriptionSite($nom,$prenom,$idAssociation,$fonction,$adresse,$codePostal,$email,$tel,$login,$mdp){
    $reussi = false;
    $pdo = Connexion();
    if ($pdo != false) {
        
        $req = "INSERT INTO personnelassociatif VALUES (null,:login,:mdp,:adresse,:email,:nom,:prenom,:tel,:codePostal,:fonction,1,:idAssociation)";
        
        $pdoStatement = $pdo->prepare($req);
        $pdoStatement->bindParam(":login", $login);
        $pdoStatement->bindParam(":mdp", $mdp);
        $pdoStatement->bindParam(":adresse", $adresse);
        $pdoStatement->bindParam(":email", $email);
        $pdoStatement->bindParam(":nom", $nom);
        $pdoStatement->bindParam(":prenom", $prenom);
        $pdoStatement->bindParam(":tel", $tel);
        $pdoStatement->bindParam(":codePostal", $codePostal);
        $pdoStatement->bindParam(":fonction", $fonction);
        $pdoStatement->bindParam(":idAssociation", $idAssociation);
        
        $pdoStatement->execute();
        $reussi = $pdoStatement->rowCount();
    }
    return $reussi;
}

//mise à jour du profil
function majProfil($nom,$prenom,$idAssociation,$fonction,$adresse,$codePostal,$email,$tel,$login){
    $reussi = false;
    $pdo = Connexion();
    if ($pdo != false) {        
        
        $req = "UPDATE personnelassociatif SET adresse=:adresse,email=:email,nom=:nom,prenom=:prenom,tel=:tel,codePostal=:codePostal,fonction=:fonction,idAssociation=:idAssociation WHERE login=:login";

        $pdoStatement = $pdo->prepare($req);
        $pdoStatement->bindParam(":login", $login);
        $pdoStatement->bindParam(":adresse", $adresse);
        $pdoStatement->bindParam(":email", $email);
        $pdoStatement->bindParam(":nom", $nom);
        $pdoStatement->bindParam(":prenom", $prenom);
        $pdoStatement->bindParam(":tel", $tel);
        $pdoStatement->bindParam(":codePostal", $codePostal);
        $pdoStatement->bindParam(":fonction", $fonction); 
        $pdoStatement->bindParam(":idAssociation", $idAssociation);
       
        $pdoStatement->execute();
        $reussi = $pdoStatement->rowCount();
//        var_dump($pdoStatement->errorInfo());
    }
    return $reussi;
}

// Afficher les inscriptions aux sessions de formation du bénévole passé en paramètre
function getInscriptionSessions($idPersonnel){
    $pdo = connexion();
    if($pdo != null){
        $sql = "SELECT dateDebut, dateFin, titre, formation.descriptif, inscription.idSession, idPersonne "
                . "FROM inscription "
                . "JOIN sessionformation ON inscription.idSession = sessionformation.idSession "
                . "JOIN formation ON sessionformation.idFormation = formation.idFormation "
                . "WHERE idPersonne = :idPersonnel";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindParam(":idPersonnel", $idPersonnel);
        $pdoStatement->execute();
        $lesInscriptions = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $lesInscriptions;
}

//// Afficher l'historique des inscriptions aux sessions
//function historiqueSession($idPersonnel){
//    $historiques = getInscriptionSessions($idPersonnel);
//    $histoSessions = array();
//    if(!empty($historiques)){
//        foreach ($historiques as $historique){
//            if(strtotime($historique["dateFin"]) < strtotime(date("Y-m-d H:i:s"))){
//                $histoSessions[] = $historique["idSession"];
//            }            
//        }
//                
//        $pdo = connexion();
//        if($pdo != null){
//            $sql = "SELECT titre, descriptif FROM sessionformation JOIN formation ON sessionformation.idFormation = formation.idFormation WHERE ";
//            
//            $string = "";
//            $compteur = 0;
//            foreach($histoSessions as $elem){
//                if($compteur>0){
//                    $string .= "OR idSession = ". $elem. " ";
//                }else{
//                    $string .= "idSession = ". $elem. " ";
//                }
//                $compteur += 1;
//            }
//            $pdoStatement = $pdo->query($sql.$string);
//            $lesHistoriques = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
//        }
//        return $lesHistoriques;        
//    }
//    return false;
//}


// Désinscription du site de la maison des ligues
function desinscriptionSite($login){
    $reussi = false;
    $pdo = Connexion();
    if ($pdo != false) {     

        $req = "UPDATE personnelassociatif SET actif=0 WHERE login = :login";
        
        $pdoStatement = $pdo->prepare($req);
        $pdoStatement->bindParam(":login", $login);

        $pdoStatement->execute();
        $reussi = $pdoStatement->rowCount();
    }
    return $reussi;
}


// Désinscription d'un session de formation
function desinscriptionFormation($idSession){
    $idPersonne = getIdPersonnel($_SESSION["user"]);
    $reussi = false;
    $pdo = Connexion();
    if ($pdo != false) {  

        $req = "DELETE FROM inscription WHERE idPersonne=:idPersonne AND idSession=:idSession";
        
        $pdoStatement = $pdo->prepare($req);
        $pdoStatement->bindParam(":idSession", $idSession);
        $pdoStatement->bindParam(":idPersonne", $idPersonne);
        $pdoStatement->execute();
        $reussi = $pdoStatement->rowCount();
    }
    return $reussi;
}

// Modification du mot de passe
function changeMDP($login,$mdp){
    $reussi = false;
    $pdo = Connexion();
    if ($pdo != false) {     

        $req = "UPDATE personnelassociatif SET mdp=:mdp WHERE login = :login";
        
        $pdoStatement = $pdo->prepare($req);
        $pdoStatement->bindParam(":login", $login);
        $pdoStatement->bindParam(":mdp", $mdp);

        $pdoStatement->execute();
        $reussi = $pdoStatement->rowCount();
    }
    return $reussi;
}