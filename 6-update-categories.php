<?php

include 'includes/connect.php';

$sql = "SELECT product.name as name, description, price, category.name as category, stock
FROM product LEFT JOIN product_has_category ON product.id = product_has_category.id_product LEFT JOIN category ON category.id = product_has_category.id_category WHERE category.id IS NULL";
    $statement = $connection->query($sql);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM category";
    $statement = $connection->query($sql);
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

 var_dump($results);
var_dump($data);

$sql = "INSERT IGNORE INTO `product_has_category`(`id_category`, `id_product`) VALUES (3, 0), (4, 1), (5, 2), (6, 3), (6, 4), (6, 5), (6, 6), (5, 7)";
    $count = $connection->exec($sql);
