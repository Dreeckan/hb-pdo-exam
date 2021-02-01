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

    // Insertion des bonnets dans la table product
    $name = $beanie['name'];
    $description = $beanie['description'];
    $price = $beanie['price'];
    $stock = $beanie['stock'];

    $sql = "INSERT INTO product(name, description, updated_at, price, stock) VALUES (:name, :description, NOW(), :price, :stock)";
    $stmt = $connection->prepare($sql);

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
    $isDone = $stmt->execute();

    if (!$isDone) {
        throw new Exception("Erreur lors de l'insertion de la donnée : " . $name);
    }

    // Récupération de l'id du bonnet en cours

    $id_beanie = $connection->lastInsertId();

    // Récupération de la table category

    $category = [];

    $sql = "SELECT * FROM category";
    $stmt = $connection->prepare($sql);
    $isDone = $stmt->execute();

    if (!$isDone) {
        throw new Exception('Erreur');
    }

    $category = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Etablir correspondance entre $beanie['caterories] et les id_category

    $id_category = [];
    foreach ($beanie['categories'] as $category) {
        $i=0; //compteur pour parcourir les id_category

        $id_category[] = array_search($category, $beanie['categories']);

        // Insertion des id product et id category dans la table product_has_category
    
        $sql = "INSERT IGNORE INTO product_has_category(id_category, id_product) VALUES (:id_category, :id_product)";
        $stmt = $connection->prepare($sql);
    
        $stmt->bindParam(':id_category', $id_category[$i], PDO::PARAM_INT);
        $stmt->bindParam(':id_product', $id_beanie, PDO::PARAM_INT);
        
        $i++;
        
        $isDone = $stmt->execute();
        if (!$isDone) {
            throw new Exception("Erreur");
        }
    }
}
