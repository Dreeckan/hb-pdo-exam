<?php

include 'includes/connect.php';

$data = [];

$sql = "SELECT product.name as name, description, price, category.name as category, stock
        FROM product 
        LEFT JOIN product_has_category ON product.id = product_has_category.id_product 
        LEFT JOIN category ON product_has_category.id_category = category.id";
$statement = $connection->prepare($sql);
$isDone = $statement->execute();

if (!$isDone) {
    throw new Exception('Erreur');
}
$statement->setFetchMode(PDO::FETCH_ASSOC);
$data = $statement->fetchAll();

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
            <?php
            if ($beanie['category'] == null) {
                echo '<td>Non défini</td>';
            } else {
                echo '<td>'.$beanie['category'].'</td>';
            }?>
            <td> <?= $beanie['name']?> </td>
            <td> <?= $beanie['description']?> </td>
            <td> <?= $beanie['price']?> </td>
      
            <td> <?= $beanie['stock']?> </td>
        </tr>
    <?php } ?>
</table>
