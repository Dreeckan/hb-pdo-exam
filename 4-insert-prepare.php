<?php

include 'includes/connect.php';



$data = [
    'Chapeaux',
    'Bérets',
    'Chapka',
    'Cache-oreilles',
    'Bandeaux',
];

$sql = "INSERT INTO category(Bonnets, Casquette) VALUES (:bonnets, :casquette)";
$stmt = $connection->prepare($sql);

foreach ($data as $beanie) {
    $stmt->bindParam(':Bonnets', $data[0], PDO::PARAM_STR);
    $stmt->bindParam(':Casquette', $data[1], PDO::PARAM_STR);

    var_dump($data);
    $ret = $stmt->execute();

    if ($ret === false) {
        throw new Exception('Erreur lors de l\'insertion de la donnée' . $data[0]);
    }
}
