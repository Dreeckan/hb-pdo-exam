<?php

include 'includes/connect.php';

$data = [
    'Chapeaux',
    'Bérets',
    'Chapka',
    'Cache-oreilles',
    'Bandeaux',
];

$sql = "INSERT INTO category (`name`) VALUES (:name) ";
$stmt = $connection->prepare($sql);
if ($stmt === false) {
    exit("Erreur lors de l'insertion de la donnée :");
}

foreach ($data as $info) {
    $stmt->bindParam(':name', $info, PDO::PARAM_STR);
    $ret = $stmt->execute();
}
