
<?php
$notes = ["Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
           "Samir" => 12, "Zakariya" => 13, "Rafik" => 10, "Ilham" => 9,
              "Hamza" => 7, "Sami" => 7, "Noura" => 14];

$modules =["Analyse", "Programmation Web", "Python"];
foreach ($modules as $module) {
    echo "module : $module <br>";
}

echo "indice 0 :" .$module[0]. "<br>";
echo "indice 1 :" .$module[1]. "<br>";
echo "indice 2 :" .$module[2]. "<br>";

//calcul mention
function mention($note){
    if($note < 10){
        return "Insuffisant";
    }elseif($note < 12){
        return "Passable";
    }elseif($note < 14){
        return "Assez bien";
    }elseif($note < 16){
        return "Bien";
    }
    else{
        return "Très bien";
    }
}

$somme = 0;
$max = 0;
$min = 20;

foreach ($notes as $note) {
    $somme += $note;
    if ($note > $max) {
        $max = $note;
    }
    if ($note < $min) {
        $min = $note;
    }
}
$moyenne = $somme / count($notes);
echo"la somme :" .$somme. "<br>";
echo"la moyenne : " .(array_sum($notes) / count($notes)). "<br>";
echo"Max : " .max($notes). "<br>";
echo"Min : " .min($notes). "<br>";

$effectifs = [];
foreach($notes as $note){
    $m = mention($notes);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }
    $effectifs[$m]++;
}
echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
echo "<tr><th>Mention</th><th>Nombre d'apprenants</th></tr>";
foreach ($effectifs as $mentionNom => $nombreApprenants) {
    echo "<tr><td>$mentionNom</td><td>$nombreApprenants</td></tr>";
}
echo "</table>";
//exercice 3.4
function afficher($tab){
    echo"<table border = '1' cellpaddin = '5' style = 'border-collapse: collapse; margin-bottom: 20px;' >";
    echo"<tr><th>Nom</th></tr>";
    foreach($tab as $nom => $note){
        echo "<tr><td>$nom</td><td>$note</td></tr>";
    }
    echo"</table>";

}
echo"<h3> 1.tableau trié par noms croissants(Ksort)</h3>";
$t1 = $notes;
ksort($t1);
afficher($t1);

echo"<h3> 2.tableau trié par notes décroissants(arsort)<h3>";
$t2 = $notes;
arsort($t2);
afficher($t2);

echo"<h3> 3.tableau trié par noms décroissants(Ksort)</h3>";
$t3 = $notes;
ksort($t3);
afficher($t3);

echo"<h3> 4.tableau trié par notes croissants(asort)<h3>";
$t4 = $notes;
asort($t4);
afficher($t4);

//Pour un tableau indexé (numérique), on utilise la fonction sort() (pour un tri croissant) ou rsort() (pour un tri décroissant).

//exercice 3.5
/*
Soit $a = ["x" => 1, "y" => 2] et $b = ["y" => 2, "x" => 1].

Prédictions et vérifications :
$a + $b (Union) :

Résultat : ["x" => 1, "y" => 2]

Explication : L'opérateur + ajoute les éléments du tableau de droite ($b) au tableau de gauche ($a) uniquement pour les clés qui n'existent pas encore. Comme les clés "x" et "y" existent déjà dans $a, les valeurs de $b sont ignorées.

$a == $b (Égalité) :

Résultat : true

Explication : Deux tableaux sont considérés comme égaux s'ils ont les mêmes paires clé/valeur, peu importe l'ordre dans lequel elles ont été déclarées.

$a === $b (Identité) :

Résultat : false

Explication : L'opérateur strict === exige que les tableaux aient les mêmes paires clé/valeur, du même type, mais aussi dans le même ordre. Ici, $a commence par la clé "x" tandis que $b commence par la clé "y".
*/
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<h2>Vérification des opérateurs de tableaux</h2>";


echo "<h3>1. Union (\$a + \$b)</h3>";
echo "<pre>";
print_r($a + $b);
echo "</pre>";

echo "<h3>2. Égalité (\$a == \$b)</h3>";
echo "Résultat : " . (($a == $b) ? 'true' : 'false') . "<br>";


echo "<h3>3. Identité (\$a === \$b)</h3>";
echo "Résultat : " . (($a === $b) ? 'true' : 'false') . "<br>";



?>
<?php
include "includes/entete_inc.php";
include "includes/menu_inc.php";
?>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Note</th>
            <th>Mention</th>
        </tr>
    <?php foreach ($notes as $nom => $note): ?>
        <tr <?= ($note < SEUIL) ? 'style="color: red;"' : '' ?>>
                <td><?= $nom ?></td>
                <td><?= $note ?></td>
                <td><?= mention($note) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

   <?php
   include "includes/pied_inc.php";
   ?>
