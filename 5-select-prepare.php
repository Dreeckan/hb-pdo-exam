<?php

include 'includes/connect.php';

$data = [];
?>

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Catégories</th>
        <th>En stock</th>
    </tr>
    <?php
    $sql = "SELECT product.name as name, description, price, category.name as category, stock
FROM product JOIN product_has_category ON product.id = product_has_category.id_product JOIN category ON category.id = product_has_category.id_category";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

     foreach ($data as $beanie) {
         ?>
        <tr>
            <td><?= $beanie['name'] ?></td>
            <td><?= $beanie['description'] ?></td>
            <td><?= $beanie['price'] ?></td>
            <td><?= $beanie['category'] ?></td>
            <td><?= $beanie['stock'] ?></td>
        </tr>
    <?php
     } ?>
</table>
