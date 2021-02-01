<?php

include 'includes/connect.php';

$data = [
    [
        'name'        => 'Bonnet - Oscar light grey',
        'description' => "
Voici un bonnet urbain par excellence, avec sa forme allongée moderne et sa matière très douce en coton biologique que vous apprécierez tout au long de l’année. Il est tricoté en Suède dans les ateliers de la marque traditionnelle Sätila.
Matière: 100 % Coton Biologique

    Reference : SAT01086
    Genre : femme
    Forme : long
    Couleur : gris
    Taille : 56",
        'price'       => 31.43,
        'stock'       => 1,
    ],
    [
        'name'        => 'Bonnet - Headsock in recycled yarn black',
        'description' => "
Affichez une allure originale avec ce sympathique bonnet long noir, qui tient bien en place grâce à ses côtes verticales. Il est composé d’un mélange très doux de fibres provenant en partie de bouteilles en plastique recyclées.
Matière: 50 % Acrylique, 50 % Polyester

    Reference : SEE01364
    Genre : femme
    Forme : long
    Couleur : noir",
        'price'       => 25.90,
        'stock'       => 1,
    ],
    [
        'name'        => 'Bonnet - Rada camel',
        'description' => "
Chez la marque suédoise Sätila, l’environnement et la qualité ne sont pas pris à la légère, notamment avec ce magnifique bonnet long tricoté en Suède avec 41 % de fibres recyclées, combinant la laine, la viscose et le cachemire pour un résultat doux et bien chaud.
Matière: 32 % Laine, 32 % Polyamide, 30 % Viscose, 3 % Cashmere 3 % Autres fibres

    Reference : SAT01083
    Genre : femme
    Forme : long
    Couleur : beige
    Taille : 56",
        'price'       => 34.23,
        'stock'       => 1,
    ],
];


$sql = "INSERT INTO `product`(`name`, `description`, `updated_at`, `price`, `stock`) VALUES 

('Bonnet - Oscar light grey', 'Voici un bonnet urbain par excellence, avec sa forme allongée moderne et sa matière très douce en coton biologique que vous apprécierez tout au long de l’année. Il est tricoté en Suède dans les ateliers de la marque traditionnelle Sätila.
Matière: 100 % Coton Biologique
    Reference : SAT01086
    Genre : femme
    Forme : long
    Couleur : gris
    Taille : 56', NOW(), '34.23', '1'), 
    
    ('Bonnet - Headsock in recycled yarn black', 'Affichez une allure originale avec ce sympathique bonnet long noir, qui tient bien en place grâce à ses côtes verticales. Il est composé d’un mélange très doux de fibres provenant en partie de bouteilles en plastique recyclées.
Matière: 50 % Acrylique, 50 % Polyester
    Reference : SEE01364
    Genre : femme
    Forme : long
    Couleur : noir', NOW(), '25.90', '1'), 
    
    ('Bonnet - Rada camel', 'Chez la marque suédoise Sätila, l’environnement et la qualité ne sont pas pris à la légère, notamment avec ce magnifique bonnet long tricoté en Suède avec 41 % de fibres recyclées, combinant la laine, la viscose et le cachemire pour un résultat doux et bien chaud.
Matière: 32 % Laine, 32 % Polyamide, 30 % Viscose, 3 % Cashmere 3 % Autres fibres
    Reference : SAT01083
    Genre : femme
    Forme : long
    Couleur : beige
    Taille : 56', NOW(), '34.23', '1')";
    
$countAffected = $connection->exec($sql);

if ($countAffected === false) {
    exit('Erreur lors de l\'insertion des données');
}

var_dump($countAffected);