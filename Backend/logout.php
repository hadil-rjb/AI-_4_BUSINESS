<?php
// Initialisation de la session
session_start();

// Destruction de toutes les données de la session
$_SESSION = array();

// Destruction de la session
session_destroy();

// Redirection vers la page de connexion (ou une autre page)
header("Location: login.php");
exit;
