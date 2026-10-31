<?php
$cheminFichier = 'data/notes.csv';
$sommeMoyennes = 0;
$nombreEtudiants = 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Notes</title>
</head>
<body>

    <h2>Liste des Apprenants et Notes</h2>

    <?php
    
    if (!file_exists($cheminFichier)) {
        echo "<p style='color: red; text-align: center;'>Erreur : Le fichier des notes n'existe pas.</p>";
        exit;
    }

    
    $fichier = fopen($cheminFichier, 'r');
    if ($fichier === false) {
        echo "<p style='color: red; text-align: center;'>Erreur : Impossible d'ouvrir le fichier.</p>";
        exit;
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Info</th>
                <th>Math</th>
                <th>Moyenne</th>
                <th>Mention</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while (($ligne = fgetcsv($fichier, 1000, ';')) !== false) {
              
                $nom = $ligne[0] ?? '';
                $info = isset($ligne[1]) ? floatval($ligne[1]) : 0;
                $math = isset($ligne[2]) ? floatval($ligne[2]) : 0;

                $moyenneEtudiant = ($info + $math) / 2;
                
                
                $sommeMoyennes += $moyenneEtudiant;
                $nombreEtudiants++;

                
                $mention = "Passable";
                if ($moyenneEtudiant >= 16) { $mention = "Très Bien"; }
                elseif ($moyenneEtudiant >= 14) { $mention = "Bien"; }
                elseif ($moyenneEtudiant >= 12) { $mention = "Assez Bien"; }
                elseif ($moyenneEtudiant < 10) { $mention = "Insuffisant"; }

          
                echo "<tr>";
                echo "<td>" . htmlspecialchars($nom) . "</td>";
                echo "<td>" . $info . "</td>";
                echo "<td>" . $math . "</td>";
                echo "<td>" . number_format($moyenneEtudiant, 2) . "</td>";
                echo "<td>" . $mention . "</td>";
                echo "</tr>";
            }

            fclose($fichier);
            ?>
        </tbody>
    </table>

    <?php
    if ($nombreEtudiants > 0) {
        $moyenneGenerale = $sommeMoyennes / $nombreEtudiants;
        echo "<div class='general'>Moyenne Générale de la classe : " . number_format($moyenneGenerale, 2) . " / 20</div>";
    } else {
        echo "<div class='general'>Aucun étudiant enregistre pour le moment.</div>";
    }
    ?>

</body>
</html>