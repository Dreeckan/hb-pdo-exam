<?php

include 'includes/connect.php';

$data = [];
$sql = "SELECT * FROM product";
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
        </tr>';
} ?>
</table>
