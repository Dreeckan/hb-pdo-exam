<?php

include 'includes/connect.php';

$data = [
    'Chapeaux',
    'Bérets',
    'Chapka',
    'Cache-oreilles',
    'Bandeaux',
];

$sql = "INSERT INTO category(name) VALUES (:name)";
$stmt = $connection->prepare($sql);

foreach ($data as $beanie) {
    $stmt->bindParam(':name', $beanie, PDO::PARAM_STR);
    $ret = $stmt->execute();

    if (!$ret) {
        throw new Exception('Erreur lors de l\'insertion de la donnée : ' . $beanie);
    }
}
