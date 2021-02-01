<?php

include 'includes/connect.php';

// Récupération des produits sans catégories dans un tableau data

$data = [];

$sql = "SELECT * FROM product 
LEFT JOIN product_has_category ON product.id = product_has_category.id_product 
WHERE product_has_category.id_product IS NULL";
$stmt = $connection->prepare($sql);
$isDone = $stmt->execute();

if (!$isDone) {
    throw new Exception('Erreur');
}

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Récupération des categories dans un tableau category

$category = [];

$sql = "SELECT * FROM category";
$stmt = $connection->prepare($sql);
$isDone = $stmt->execute();

if (!$isDone) {
    throw new Exception('Erreur');
}

$category = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Ajout des catégories aux produits du tableau data

$sql = "INSERT IGNORE INTO product_has_category(id_category, id_product) VALUES (:id_category, :id_product)";
$stmt = $connection->prepare($sql);

foreach ($data as $beanie) {
    $id_category = random_int(1, count($category));
    $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
    $stmt->bindParam(':id_product', $data['id'], PDO::PARAM_INT);
    
    $isDone = $stmt->execute();
    if (!$isDone) {
        throw new Exception("Erreur");
    }
}
