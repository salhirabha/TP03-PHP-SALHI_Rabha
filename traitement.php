<?php 
$nom     = $_POST['nom'] ?? '';
$prenom  = $_POST['prenom'] ?? '';
$matiere = $_POST['matiere'] ?? '';
$note    = $_POST['note'] ?? '';

$fichier = fopen('data/notes.csv', 'a');

if($fichier !== false){
    $ligneApprenant = [$nom, $prenom, $matiere, $note];

    fputcsv($fichier, $ligneApprenant, ';');

    fclose($fichier);

    echo "les donnees de l'apprenant ont été enregostrées avec succés."; 
}else {
    echo "Erreur : impossible d'ouvrir le fichier des notes.";
}
?>