<?php
// db_connect.php
$servername = 'localhost'; // Your database host
$dbname = 'client_db'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password
$charset = 'utf8mb4';

$dsn = "mysql:servername=$servername;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>