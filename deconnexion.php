<?php 
// Créer une référence qui pointe vers un tableau vierge 
$_SESSION=[];

// ouverture des sessions
session_start();

// générer un nouvel id pour éviter que l'utilisateur réutilise l'ancien par hasard
session_regenerate_id();

// pour détruire toutes les données associées à la session courante
session_destroy();

// redirection vers la page d'index
header("Location:index.php");



