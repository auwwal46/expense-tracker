<?php
$host = 'localhost';
$db   = 'expense_tracker';
$user = 'root';
$pass = 'auwwal'; // or your MySQL root password

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
