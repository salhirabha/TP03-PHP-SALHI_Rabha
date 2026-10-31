<?php
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$sexe = $_GET['sexe'];

if($sexe == "M"){
    echo "Bonjour Monsieur $prenom $nom";
}else{
    echo "Bonjour Madame $prenom $nom";
}


?>