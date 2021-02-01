<?php

include 'includes/connect.php';

$data = [];

$sql = "SELECT * FROM product LEFT JOIN product_has_category ON product.id = product_has_category.id_product";
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
            if ($beanie['id_category'] == null) {
                echo '<td></td>';
            } else {
                echo '<td>'.$beanie['id_category'].'</td>';
            }?>
            <td><?= $beanie['stock']?></td>
        </tr>
    <?php } ?>
</table>
