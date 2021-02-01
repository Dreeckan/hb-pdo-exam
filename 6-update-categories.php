<?php

include 'includes/connect.php';

$data = [];

$sql = "SELECT product.name, description, price, category.name
        FROM product 
        LEFT JOIN product_has_category ON product.id = product_has_category.id_product 
        LEFT JOIN category ON product_has_category.id_category = category.id
        WHERE category.id IS NULL";

$statement = $connection->prepare($sql);
$isDone = $statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);
$data = $statement->fetchAll();

$data2 = [];

$sql = "SELECT *
        FROM category 
        LEFT JOIN product_has_category ON category.id = product_has_category.id_category
        LEFT JOIN product ON product_has_category.id_product = product.id";

$statement = $connection->prepare($sql);
$isDone = $statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);
$data2 = $statement->fetchAll();

// J'ai rien compris a l'énoncé :(