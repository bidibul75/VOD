<?php

$config = require('config.php');

try {
   
    $pdo = new PDO("mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_username']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = :db_name";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':db_name', $config['db_name']);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        
        $installQuery = file_get_contents('install.sql'); 
        
        $pdo->exec($installQuery);

        echo 'Base de données installée avec succès.';
    } else {
        echo 'La base de données existe déjà.';
    }
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
