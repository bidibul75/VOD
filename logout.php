<?php
// Démarrer ou récupérer la session existante
session_start();

// Détruire toutes les données de session
session_destroy();

// Rediriger vers la page de connexion (ou toute autre page après la déconnexion)
header("Location: index.php");
exit();
?>
