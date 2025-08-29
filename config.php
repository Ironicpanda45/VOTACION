<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '4667275_votacion');
define('DB_PASSWORD', 'contrasena2004');
define('DB_NAME', '4667275_votacion');

try {
    $connection = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>