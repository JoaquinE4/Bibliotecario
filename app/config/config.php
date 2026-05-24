<?php

$DB_HOST = 'localhost';
$DB_NAME = 'mi_biblioteca';
$DB_USER = 'root';
$DB_PASS = '';

try {
    $pdo = new PDO("mysql:host=" . $DB_HOST . ";charset=utf8", $DB_USER, $DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `" . $DB_NAME . "`");
    $pdo->exec("USE `" . $DB_NAME . "`");

    if ($pdo->query("SHOW TABLES LIKE 'escritores'")->rowCount() === 0) {
        $pdo->exec(file_get_contents(__DIR__ . '/../../db/mi_biblioteca.sql'));
    }
} catch (PDOException $e) {
    error_log("Error crítico de base de datos: " . $e->getMessage());
    exit();
}
