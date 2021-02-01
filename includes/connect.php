<?php

include 'db.inc.php';


try {
    $connection = new PDO($dbDsn, $dbUser, $dbPass);
} catch (PDOException $e) {
    exit('Connexion échouée : ' . $e->getMessage());
}
