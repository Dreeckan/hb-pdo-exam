<?php

include 'includes/connect.php';

$data = [];
$sql = "SELECT product.name as name, description, price, category.name as category, stock
FROM product
        LEFT JOIN product_has_category ON product.id = product_has_category.id_product
        LEFT JOIN category ON category.id = product_has_category.id_category
        WHERE category.id IS NULL";
$stmt = $connection->prepare($sql);
$ret =  $stmt->execute();


?>

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>En stock</th>
        <th>Catégories</th>
    </tr>
    <?php foreach ($data = $stmt->fetchAll(PDO::FETCH_ASSOC) as $beanie) {
    echo ' <tr>
            <td> '.$beanie['name'].' </td>
            <td> '.$beanie['description'].' </td>
            <td> '.$beanie['price'].' </td>
            <td> '.$beanie['stock'].' </td>
            <td> '.$beanie['category'].' </td>
        </tr>';
} ?>
</table>
