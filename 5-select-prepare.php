<?php

include 'includes/connect.php';

$data = [];

$sql = "SELECT * FROM product";
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
        <th>Categorie</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>En stock</th>
    </tr>
    <?php foreach ($data as $beanie) { ?>
        <tr>
            <td> <?php if(!empty($beanie['categorie'])) {
                echo empty($beanie['categorie']);
                } else {
                echo 'non défini';
                }?></td> 
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
