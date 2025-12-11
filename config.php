<?php
// Detect if running inside Docker
$isDocker = file_exists('/.dockerenv');

// Choose host dynamically
$host = $isDocker ? "db" : "127.0.0.1";

$dbname = "shop_db";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
