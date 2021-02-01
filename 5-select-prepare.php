<?php

include 'includes/connect.php';

$data = [];
$sql = "SELECT product.name as name, description, price, category.name as category, stock
FROM product
        LEFT JOIN product_has_category ON product.id = product_has_category.id_product
        LEFT JOIN category ON category.id = product_has_category.id_category";



$statement = $connection->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$data = $results;
?>

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Catégories</th>
        <th>En stock</th>
    </tr>
    <?php foreach ($data as $beanie) {
    echo '
                <tr>
                    <td>' .$beanie['name']. '</td>
                    <td>' .$beanie['description']. '</td>
                    <td>' .$beanie['price']. '</td>
                    <td>' .$beanie['category']. '</td>
                    <td>' .$beanie['stock']. '</td>
                </tr>';
} ?>
    </table>
