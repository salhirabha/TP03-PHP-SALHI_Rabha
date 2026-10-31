<?php
// Démarrer la session 
session_start();

// 1. Vider toutes les variables de session
session_unset();

// 2. Détruire complètement la session
session_destroy();

// 3. Rediriger vers la page de login
header("Location: login.php");
exit;
?>