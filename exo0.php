<?php

// CAMEL CASE (1ère lette en minuscule et 1ère lettres de chaque mot en majuscule)

$chaineDeCaracteres = "mon texte évident"; //string
$entier = 20; // integer
$flottant = 29.99; // float
$booleen = true; // ou false - boolean
$tableau1 = array ("valeur 1", "valeur 2", "valeur 3") ; 
$tableau2 = ["valeur 1", "valeur 2", "valeur 3"] ; // array
$date = new DateTime(); 

echo $chaineDeCaracteres."<br/>";  // .= concaténation
echo $entier."<br/>";
echo "$chaineDeCaracteres<br/>$entier"."<br/>"; 
// var_dump($tableau1[0]); DEBUG

echo mb_strtoupper($chaineDeCaracteres)."<br/>"; // conversion en maj avec accent

$texte = "mon autre texte";

echo str_word_count($texte)."<br/>"; // compte le nombre de mots
echo strlen($texte)."<br/>"; // compte le nombre de lettres
echo "il y a ".count($tableau2)." éléments dans le tableau<br/>"; 
echo $date->format("d-m-y")."<br/>";
echo gettype($chaineDeCaracteres)."<br/>"; // renvoi le type de la variable

$prixTTC = 9.95;
$quantite = 5;
$cost = "mon article coûte";
echo "$cost $prixTTC €"."<br/>";
echo "le total est de ". $prixTTC * $quantite . " €<br/>";
$pi = pi();
echo round($pi, 2)."<br/>"; // arrondir à 2 chiffres après la virgule

// CONDITIONELLES

$prenom = "Julien";
$age = 35; 

if($age >=18) {
    echo "$prenom est majeur<br>";
} else {
    echo "$prenom est mineur<br>";
}

// Ternaire
$reponse = ($age >= 18) ? "majeur" : "mineur"; // ? est alors et : est sinon
echo "$prenom est $reponse<br>"; 

echo "$prenom est ". ($age >= 18 ? "majeur" : "mineur")."<br>";

// jours de congés :
// 3 jours de congés pour les femmes qui ont 2 enfants ou plus
// 2 jours pour toutes les autres personnes

$sexe = "F";
$nbEnfants = 2;

if($sexe == "F" && $nbEnfants >=2) {
    $nbJours = 3;
} else {
    $nbJours = 2;
}
echo "le nombre de jours de congés de $nbJours jours<br>";


$age = 21;
switch($age) {
    case 18: echo "trop jeune<br>"; break;
    case 21: echo "toujours trop jeune<br>"; break;
    default : echo "age ok<br>"; 
}

// BOUCLES
// for : pour
// while : tant que
// foreach : chaque éléments

// afficher les chiffres de 1 à 10

for($i = 1; $i <=10; $i++){
    echo $i." ";

}
echo "<br>";

$i = 1;
while($i <= 10){
    echo $i." ";
    $i++;
}
echo "<br>";

foreach(range(1,14) as $nb){
    echo $nb." ";
}
echo "<br>";

$tableauClients = ["Virgile", "Stéphane", "Mickael"];
echo $tableauClients[1]."<br>"; // affiche le 2eme élément, car on commence à 0
echo "<br>";

for($i = 0; $i < count($tableauClients); $i++){
    echo $tableauClients[$i]."<br>";
}
echo "<br>";

$j=0;
while($j < count($tableauClients)){
    echo $tableauClients[$j]."<br>";
    $j++;
}
echo "<br>";

asort($tableauClients); // trier le tableau dans l'ordre ascendant
// arsort($tableauClients); // trier le tableau DESC
foreach($tableauClients as $client){
    echo $client."<br>";
}
echo "<br>";

// Tableaux associatifs : clé => valeur (attention clé UNIQUE !)

$tabAssociatif = [
    "pauline" => "Fribourg",
    "julien" => "Strasbourg",
    "david" => "Prague"
];

foreach ($tabAssociatif as $prenom => $ville) {
    echo ucfirst($prenom)." habite ". mb_strtoupper($ville)."<br>";
}

// afficher la ville de Pauline

echo $tabAssociatif["pauline"];
echo "<br>";


// Tableaux dans un tableau
$clients = [
    "Julien" => [
        "adresse" => "3 rue du chat qui tousse",
        "cp" => "67000",
        "ville" => "STRASBOURG"

    ],
    "Marie" => [
        "adresse" => "6 rue du chien qui prout",
        "cp" => "13000",
        "ville" => "MARSEILLE"

    ]
    ];

// var_dump($clients);


echo $clients["Marie"]["ville"];
echo "<br>";

foreach($clients as $client){
        echo $client["adresse"]."<br>";
};

// FONCTIONS
echo afficherMessage();
function afficherMessage(){
    $message = "voici mon message<br>";
    return $message;
}


function calculerCarre($nombre){
    $carre = pow($nombre, 2);
    return $carre;

}
echo "le carré de 3 est ".calculerCarre(3)."<br>";

$prixHT = 115324567;
$tva = 0.20; //20% de TVA
echo "Le prix TTC de cet article est de : ".calculerPrixTTC($prixHT,$tva)." €<br>";
function calculerPrixTTC($prixHT, $tva){
    $prixTTC = $prixHT + $prixHT * $tva;
    return number_format($prixTTC, 2, ",", " ");
}

// Afficher le nombre de mots et le nombre de lettres (sans les espaces) dans une phrase

$phrase = "Ma formation est top";
echo compterMotsEtLettres($phrase);
function compterMotsEtLettres($phrase) {
    $mots = str_word_count($phrase);
    $lettres = strlen($phrase) - substr_count($phrase, " ");
    return "Il y a $mots mots et $lettres lettres (sans les espaces) dans la phrase<br>"; 
}

$number = 5;
echo "le nombre est ".pairOuImpair($number);
function pairOuImpair ($number){
    $reponse = ($number % 2 == 0) ? "pair" : "impair";
    return $reponse;

}
echo repeterMot("Hourra", 5);
function repeterMot ($mot, $nb) {
    $resultat = " ";
    for($i=1; $i <= $nb; $i++){
        $resultat .= $mot." ";
    }
    return $resultat;
}

// echo repeterMotV2("Hello", 5);
// function repeterMotV2($mot, $nb){
//     return str-repeat($mot." ", $nb);
// }