<?php

include 'includes/connect.php';

$sql = "SELECT * FROM product LEFT JOIN category WHERE category.id IS NULL";
$stmt = $connection->prepare($sql);
$ret =  $stmt->execute();
