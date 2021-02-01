<?php

include 'includes/connect.php';

$sql = "SELECT product.name as name, description, price, category.name as category, stock
FROM product LEFT JOIN product_has_category ON product.id = product_has_category.id_product LEFT JOIN category ON category.id = product_has_category.id_category WHERE category.id IS NULL";
    $statement = $connection->query($sql);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    var_dump($results);
