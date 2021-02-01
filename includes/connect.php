<?php

include 'db.inc.php';

try {
    $connection = new PDO($dsn, $dbUser, $dbPass);
} catch (PDOException $e) {
    echo('Connexion échouée : ' . $e->getMessage());
}