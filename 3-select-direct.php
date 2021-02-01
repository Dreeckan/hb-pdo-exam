<?php

include 'includes/connect.php';

$data = [];

$sql = "SELECT * 
        FROM product";
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
            <td> <?php echo $beanie['name']; ?></td>;
            <td> <?php echo $beanie['description']; ?></td>;
            <td> <?php echo $beanie['price']; ?> €</td>;
            <td> <?php if($beanie['stock'] == 1) {
                echo 'oui';
                } else {
                echo 'non';
                }?></td>
        </tr>
    <?php } ?>
</table>