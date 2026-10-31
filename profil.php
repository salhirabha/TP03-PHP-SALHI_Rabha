<?php

session_start();


if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h2>Espace Profil</h2>
    
    <p>Bienvenue, <strong><?php echo htmlspecialchars($_SESSION['login']); ?></strong> !</p>

    <p><a href="deconnexion.php">Se déconnecter</a></p>
</body>
</html>