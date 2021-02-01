<?php

include 'includes/connect.php';

$data = [];
$sql = "SELECT * FROM product";
$data = $connection->query($sql);

?>

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>En stock</th>
    </tr>
    <?php foreach ($data->fetchAll(PDO::FETCH_ASSOC) as $beanie) {
    echo ' <tr>
            <td> '.$beanie['name'].' </td>
            <td> '.$beanie['description'].' </td>
            <td> '.$beanie['price'].' </td>
            <td> '.$beanie['stock'].' </td>
        </tr>';
} ?>
</table>
