<?php

$resultats = [
    [
        "nom" => "Salhi",
        "notes" => [14, 16],
        "moyenne" => 15
    ],
    [
        "nom" => "Ahzdain",
        "notes" => [10, 12],
        "moyenne" => 11
    ]
];

$cheminJson = 'data/notes.json';

$jsonDonnees = json_encode($resultats, JSON_PRETTY_PRINT);
file_put_contents($cheminJson, $jsonDonnees);
echo "<h3>1 & 2. Données écrites dans notes.json avec succès !</h3>";


if (file_exists($cheminJson)) {
    $contenuJson = file_get_contents($cheminJson);
    $tableauDecode = json_decode($contenuJson, true); 

    echo "<h3>3. Lecture et affichage avec print_r() :</h3>";
    echo "<pre>";
    print_r($tableauDecode);
    echo "</pre>";
}


echo "<h3>4. Comparaison entre serialize() et json_encode() :</h3>";

$resultatSerialize = serialize($resultats);
$resultatJson = json_encode($resultats);

echo "<strong>Résultat avec serialize() :</strong><br>";
echo htmlspecialchars($resultatSerialize) . "<br><br>";

echo "<strong>Résultat avec json_encode() :</strong><br>";
echo htmlspecialchars($resultatJson) . "<br>";
?>