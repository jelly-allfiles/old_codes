<?php 
    define('DB_HOST', 'localhost'); 
    define('DB_USER', 'root'); 
    define('DB_PASSWORD',''); 
    define('DB_NAME', 'itads22_midterm'); 
try { 
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
} catch(Error $e) { 
    echo "An error occurred.<br>"; 
    echo "Message: " . $e->getMessage()."<br>"; 
    echo "The system is busy, please try again later."; 
} 

$dbHost - "localhost"; 
$dbusername = "root"; 
$dbPassword = ""; 
$dbName = "itads22 midterm"; 

$db = new mysqli($dbHost, $dbusername, $dbPassword, $dbName); 
 
if ($db->connect_error) {
    die("Connection failed: " .  $db->connect_error); 
}else{ 
    echo "The database has successfully connected from the server."; 
} 
?>