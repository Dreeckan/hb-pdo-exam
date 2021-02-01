<?php

include 'includes/connect.php';

$sql = "SELECT * FROM product LEFT JOIN product_has_category ON product_has_category.id_product = product.id WHERE product_has_category.id_category IS NULL";
$beanie = $connection->query($sql);

