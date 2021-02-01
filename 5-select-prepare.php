<?php

include 'includes/connect.php';

$data = [];

$sql = "SELECT product.name as name, description, price, category.name as category, stock FROM product 
LEFT JOIN product_has_category ON product.id = product_has_category.id_product 
LEFT JOIN category ON product_has_category.id_category = category.id";
$stmt = $connection->prepare($sql);
$isDone = $stmt->execute();

if (!$isDone) {
    throw new Exception('Erreur');
}

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Catégories</th>
        <th>En stock</th>
    </tr>
    <?php foreach ($data as $beanie) { ?>
        <tr>
            <td><?= $beanie['name']?></td>
            <td><?= $beanie['description']?></td>
            <td><?= $beanie['price']?></td>
            <?php
            if ($beanie['category'] == null) {
                echo '<td></td>';
            } else {
                echo '<td>'.$beanie['category'].'</td>';
            }?>
            <td><?= $beanie['stock']?></td>
        </tr>
    <?php } ?>
</table>
