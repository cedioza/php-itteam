<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$db_name = $_ENV['DB_NAME'];

$conn = new mysqli($host, $user, $password, $db_name);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
