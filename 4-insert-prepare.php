<?php

include 'includes/connect.php';


    $sql = "INSERT INTO `category`(`name`) VALUES (:name)";
    $data = [
    'Chapeaux',
    'Bérets',
    'Chapka',
    'Cache-oreilles',
    'Bandeaux',
];
    $statement = $connection->prepare($sql);
    
    foreach ($data as $beanie) {
        $statement->bindParam(':name', $beanie, PDO::PARAM_STR);
        $isDone = $statement->execute();
        
        if (!$isDone) {
            throw new Exception("Erreur lors de l'inscription de la donnée" .$beanie['name']);
        }
    }
