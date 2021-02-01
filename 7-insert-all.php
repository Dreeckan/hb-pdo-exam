<?php

include 'includes/connect.php';

$data = [
    [
        'name'        => 'Miki Corduroy & Fleece sand',
        'price'       => 84.90,
        'stock'       => 1,
        'categories'  => [
            'Bonnets',
            'Casquettes',
            'Chapka',
        ],
        'description' => "La marque parisienne Béton Ciré nous régale avec ce miki breton en velours à côtes beige, complété d’un revers sur lequel est appliquée une polaire type peau de mouton. Le résultat est un modèle unique, ajustable par une sangle en cuir, qui vous maintiendra la tête bien au chaud.
Matière: 100 % Coton, Fleece 100 % Polyester, Strap 100 % Cuir

    Reference : BXC01038
    Genre : homme
    Forme : docker
    Couleur : beige",
    ],
    [
        'name'        => 'The Sheridan olive',
        'description' => "Oubliez le froid et affichez le style vintage que vous affectionnez, avec ce sympathique bonnet péruvien vert olive conçu par la marque américaine spécialisée Coal. Décoré d’un motif géométrique traditionnel, il est complété d’un pompon assorti et de tresses aux extrémités.
Matière:

100% Acrylique

    Reference : COA01631
    Genre : homme
    Forme : peruvien
    Couleur : vert",
        'price'       => 25.90,
        'stock'       => 1,
        'categories'  => [
            'Bonnets',
            'Casquettes',
        ],
    ],
];

foreach ($data as $beanie) {
    $sql = "INSERT INTO `product`(`name`, `description`, `updated_at`, `price`, `stock`) 
            VALUES ('$beanie[name]', '$beanie[description]', NOW(), '$beanie[price]', '$beanie[stock]')";
    $isDone = $connection->exec($sql);

    if (!$isDone) {
        throw new Exception("Erreur lors de l'insertion de la donnée : $data[name]");
        }

    $idBeanie = $connection->lastInsertId();
}

//j'suis beaucoup trop perdu/pas assez pratiqué la dessus :/
// le 6 m'a perdu mais le 7 était pire encore