<?php

include 'includes/connect.php';

$data = [];

$sql = "SELECT * FROM product";
$statement = $connection->query($sql);
$data = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>En stock</th>
    </tr>
    <?php foreach ($data as $beanie) { ?>
        <tr>
            <td><?= $beanie['name']?></td>
            <td><?= $beanie['description']?></td>
            <td><?= $beanie['price']?></td>
            <td><?= $beanie['stock']?></td>
        </tr>
    <?php } ?>
</table>
