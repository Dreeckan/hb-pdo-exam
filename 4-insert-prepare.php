<?php

include 'includes/connect.php';

$data = [
    'Chapeaux',
    'Bérets',
    'Chapka',
    'Cache-oreilles',
    'Bandeaux',
];

$sql = "INSERT INTO `category`(`name`) VALUES (:name)";
foreach ($data as $beanie) {
    $name = $beanie;
    $statement = $connection->prepare($sql);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $isDone = $statement->execute();

    if (!$isDone) {
        throw new Exception('Erreur');
    }
        
    $id = $connection->lastInsertId();
        
    echo 'Erreur lors de l\'insertion de la donnée : '.$beanie[0].' inséré à avec l\'id '. $id;
}
