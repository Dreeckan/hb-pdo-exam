<?php

include 'includes/connect.php';

$data = [];

$sql = "SELECT * FROM product ORDER BY id ASC";
$beanie = $connection->query($sql);

?>



<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>En stock</th>
    </tr>
<?php

foreach ($beanie->fetchAll(PDO::FETCH_ASSOC) as $data) {
        echo '<tr>
            <td>
                 '.$data['name'].'
            </td>
            <td>
                 '.$data['description'].'
            </td>
            <td>
                 '.$data['price'].'
            </td>
            <td>
                 '.$data['stock'].'
            </td>
            </tr>';
}

?>

</table>



