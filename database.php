<?php

$host = 'localhost';
$dbname = 'fake_twitter';
$username = 'root'; // Verander dit naar je database gebruikersnaam
$password = ''; // Verander dit naar je database wachtwoord

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Databaseverbinding mislukt: " . $e->getMessage());
}
