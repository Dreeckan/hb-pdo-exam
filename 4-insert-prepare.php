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
foreach ($data as $category) {
    $stmt->bindParam(':name', $category, PDO::PARAM_STR);
    $isDone = $stmt->execute();
    if (!$isDone) {
        throw new Exception("Erreur lors de l'insertion de la donnée : " . $category);
    }
}
