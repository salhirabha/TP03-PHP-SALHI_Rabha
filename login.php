<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['login'])) {
        $_SESSION['login'] = $_POST['login'];

        setcookie("dernier_login", $_POST['login'], time() + 86400, "/");


    
        header("Location: profil.php");
        exit;
    }
}
$ancienLogin = $_COOKIE['dernier_login'] ?? '';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Page de Connexion</h2>
    
    <form action="login.php" method="POST">
        <label for="login">Votre Login :</label>
        <input type="text" id="login" name="login" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>

//Parce que ces fonctions modifient les en-têtes HTTP (HTTP Headers) de la réponse.

En architecture web, les en-têtes HTTP doivent obligatoirement être envoyés au navigateur avant le corps de la page (le code HTML, le texte, ou les espaces/retours à la ligne). Si PHP commence à afficher le moindre caractère avant setcookie() ou header(), les en-têtes sont déjà partis et verrouillés, ce qui déclenche l'erreur célèbre : "Headers already sent".