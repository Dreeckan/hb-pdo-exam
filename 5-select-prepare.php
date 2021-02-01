<?php

include 'includes/connect.php';

$data = [];

$sql = 'SELECT product.name as name, description, price, category.name as categorie, stock
FROM product
LEFT JOIN product_has_category ON product.id = product_has_category.id_product
LEFT JOIN category ON category.id = product_has_category.id_category
';
$stmt = $connection->prepare($sql);

$ret = $stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_OBJ);

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
    <?php
    foreach ($data as $beanie) {
        echo '
                <tr>
                    <td>
                        ' . $beanie->name . '
                    </td>
                    
                    <td>
                        ' . $beanie->description . '
                    </td>
                    
                    <td>
                        ' . $beanie->price . '
                    </td> 
                    <td>
                        ' . $beanie->categorie . '
                    </td>              
                    <td>
                        ' . $beanie->stock . '
                    </td>     
                </tr>';
    }
    ?>
</table>
