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
    $sql = "SELECT * FROM product JOIN product_has_category on product_has_category.id_product = product.id JOIN category on category.id = product_has_category.id_category ";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

     foreach ($data as $beanie) {
         var_dump($data)
         ?>
        <tr>
            <td><?= $beanie['name'] ?></td>
            <td><?= $beanie['description'] ?></td>
            <td><?= $beanie['price'] ?></td>
            <td></td>
            <td><?= $beanie['stock'] ?></td>
        </tr>
    <?php
     } ?>
</table>
