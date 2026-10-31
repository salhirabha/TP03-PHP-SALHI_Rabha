<?php
echo "Helle PHP";


//un commentaire de seul ligne
#un autre commentaire de seul ligne
/* un commentaire de plusieurs lignes
*/

//----------------------------------
//  Exercice 1.1 : Noms de variables
//----------------------------------

//$x   : Valide
//$_x  : Valide
//$2x  : Invalide
//$x-y  : Invalie
//$Prix-HT: Valide
//$prix ht : Invalide
//$état : valide

$x = 20;
$_x = 10;
$Prix_HT = 120;
$état = "neuf";

$a ="une variable miniscule";
$A ="une variable majuscule";

echo $a. "<br>";
echo $A. "<br>";

//-------------------------------
// Exercicce 1.2 : constantes
//-------------------------------
require 'condig.php';

echo "Etablissement : " . ETABLISSEMENT . "<br>" ;
echo "Note minimale : " . NOTE_MIN . "<br>" ;
echo "Notr maximale :" , NOTE_MAX . "<br>" ;
echo "Seuil :" . SEUIL ."<br>" ;


if (defined('SEUIL')){
    echo "la constante 'SEUIL' est bien difine.<br>";

}else{
    echo "la constante 'SEUIL' n'est pas difine.<br>";
}
if (defined('INCONNUE')){
    echo "la constante 'INCONNUE' est bien define.<br>";

    }else{
        echo"la constante 'INCONNUE' n'est pas define.<br>";}

/*
1. Que se passe-t-il si vous affichez une constante non définie ?
      - PHP va déclencher une erreur critique (Fatal Error / Warning selon la version),

2. Quelle différence y a-t-il entre `const` et `define()` ?
      - `const` : S'utilise au niveau global du script, elle est évaluée au moment de la compilation 
        (statique), et on ne peut pas la définir à l'intérieur d'une condition (`if`) ou d'une boucle.
      - `define()` : S'utilise partout (dynamique), elle est évaluée au moment de l'exécution (runtime), 
        ce qui permet de la placer à l'intérieur de blocs conditionnels (`if`).
*/


//---------------------------------
//Exercicce 1.3 : Calcul 
//---------------------------------

$prix_ht = 60;
$tva = 20;
// on calcule le prix TTC
$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

echo "Le prix TTC est :" . $prix_ttc . "€<br>" ;

//---------------------------------------
//Exercice 1.4 : Types et conversions 
//---------------------------------------
$test = 42;
$test = (string) $test;
echo "1. Cast en string : ";
var_dump($test);


echo "2. Tests de conversion en booléen : <br>";
var_dump((bool) 0);  echo"(0) <br>";
var_dump((bool) 0.0);  echo"(0.0) <br>";
var_dump((bool) "0");  echo"(\"0\") <br>";
var_dump((bool) "");  echo"(\"\") <br>";
var_dump((bool) "abc");  echo"(\"abc\") <br>";
var_dump((bool) []);  echo"([]) <br>";
var_dump((bool) null);  echo"(null) <br>";

/*
   Prédictions :
   - (int) 3.9       -> 3 (la partie décimale est tronquée)
   - (int) "12abc"   -> 12 (PHP lit les chiffres au début de la chaîne)
   - (float) "1.5e3" -> 1500 (notation scientifique convertie en float)
   - (int) true      -> 1 (le booléen true vaut 1 en entier)
*/
echo "3. Autres conversions :<br>";
echo "(int) 3.9 = " . (int) 3.9 . "<br>";
echo "(int) \"12abc\" = " . (int) "12abc" . "<br>";
echo "(float) \"1.5e3\" = " . (float) "1.5e3" . "<br>";
echo "(int) true = " . (int) true . "<br><br>";


$dec = 255;          // Décimal
$hex = 0xFF;         // Hexadécimal 
$oct = 0377;         // Octal 
$bin = 0b11111111;   // Binaire 

echo "4. Représentation du nombre 255 :<br>";
echo "Décimal : " . $dec . "<br>";
echo "Hexadécimal (0xFF) : " . $hex . "<br>";
echo "Octal (0377) : " . $oct . "<br>";
echo "Binaire (0b11111111) : " . $bin . "<br>";


//---------------------------------------
//Exercice 1.5 : CHaines de caractéres
//---------------------------------------
$traitees = "égales à";
$ici = 2 ;

echo 'Ahmed a dit : "J ai réussi" <br>';
echo 'Vouler-vous suuprimer C:\*.*? <br>';
echo 'Ceci n affichera pas \n de nouvelle ligne';
echo 'Les variables ne seront pas $traitees $ici <br>';
echo 'les variables seront égales à 2<br>';

$chaine = "*Bonjour les développeurs*";
$chaine_nettoyee = trim($chaine, "*");

echo "1. Chaîne sans les étoiles : " . $chaine_nettoyee . "<br><br>";

echo "2. Affichage lettre par lettre :<br>";
$longueur = strlen($chaine_nettoyee);

for ($i = 0; $i < $longueur; $i++) {
    echo $chaine_nettoyee[$i] . "<br>";
}

?>