<?php

include 'includes/connect.php';

$sql = "SELECT product.name as name, description, price, category.name as category, stock
FROM product
        LEFT JOIN product_has_category ON product.id = product_has_category.id_product
        LEFT JOIN category ON category.id = product_has_category.id_category
        WHERE category.id IS NULL";
    $statement = $connection->prepare($sql);
    $isDone = $statement->execute();

    if (!$isDone) {
        throw new Exception('Erreur');
    }
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $results = $statement->fetchAll();

$data = $results;
?>

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Catégories</th>
        <th>En stock</th>
    </tr>
    <?php foreach ($data as $beanie) {
    echo '
                <tr>
                    <td>
                        '.$beanie['name'].'
                    </td>
                    
                    <td>
                        '.$beanie['description'].'
                    </td>
                    
                    <td>
                        '.$beanie['price'].'
                    </td> 
                                   
                    <td>
                        '.$beanie['category'].'
                    </td>
                    <td>
                        '.$beanie['stock'].'
                    </td>
                </tr>';
} ?>
</table>

<?php

$sql = "SELECT * FROM category";
$statement = $connection->prepare($sql);
$isDone = $statement->execute();

    if (!$isDone) {
        throw new Exception('Erreur');
    }

$statement->setFetchMode(PDO::FETCH_ASSOC);
$results = $statement->fetchAll();

$category = $results;

?>
<table>
    <tr>
        <th>Catégories</th>
    </tr>
    <?php foreach ($category as $beanie) {
    echo '  
            <tr>               
                <td>
                    '.$beanie['name'].'
                </td>
            </tr>';
} ?>
</table>

<?php
$sql = "INSERT IGNORE INTO product_has_category(id_category, id_product) VALUES (:id_category, :id_product)";
$statement = $connection->prepare($sql);

foreach ($data as $beanie) {
    $id_category = random_int(1, count($category));
    $statement->bindParam(':id_category', $id_category, PDO::PARAM_STR);
    $statement->bindParam(':id_product', $data['id'], PDO::PARAM_STR);
    
    $isDone = $statement->execute();
    if (!$isDone) {
        throw new Exception("Erreur");
    }
}
