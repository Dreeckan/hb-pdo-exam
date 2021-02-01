<?php

include 'includes/connect.php';

$sql = 'SELECT product.id, product.name, description, category.name AS categorie FROM `product`
LEFT JOIN product_has_category ON product_has_category.id_product = product.id
LEFT JOIN category ON category.id = product_has_category.id_category
WHERE category.name IS NULL';

$stmt = $connection->prepare($sql);
$ret = $stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_OBJ);
$data = $results;


$sql = 'SELECT * FROM `category`';

$stmt = $connection->prepare($sql);
$ret = $stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$categorie = $results;


$sql = 'INSERT IGNORE INTO product_has_category(id_category, id_product) VALUES (:categorie, :product)';
foreach ($data as $beanie) {
    $beanie->categorie = $categorie[rand(0, (count($categorie)) - 1)]['id'];
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':categorie', $beanie->categorie, PDO::PARAM_STR);
    $stmt->bindParam(':product', $beanie->id, PDO::PARAM_STR);

    $ret = $stmt->execute();
}





