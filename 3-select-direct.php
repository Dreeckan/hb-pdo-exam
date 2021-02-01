<?php

include 'includes/connect.php';

$data = [];
?>

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>En stock</th>
    </tr>
    <?php
    $sql = "SELECT * FROM product";
    $statement = $connection->query($sql);
    foreach ($statement->fetchAll(PDO::FETCH_ASSOC) as $beanie) { ?>
        <tr>
            <td><?= $beanie['name'] ?></td>
            <td><?= $beanie['description'] ?></td>
            <td><?= $beanie['price'] ?></td>
            <td><?= $beanie['stock'] ?></td>
        </tr>
    <?php } ?>
</table>
