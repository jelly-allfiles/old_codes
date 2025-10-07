<?php
include = '../php/db_connection.php';

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST['email'];

$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

if ($password === $confirmPassword) {
// Prepare and execute
$stmt = $conn->prepare("UPDATE userdata SET password = ? WHERE email = ?");
$stmt->bind_param("ss", $password, $email);

if ($stmt->execute()) {
$message = "Password updated successfully";
$toastClass = "bg-success";
} else {
$message = "Error updating password";
$toastClass = "bg-danger";
}

$stmt->close();
} else {
$message = "Passwords do not match";
$toastClass = "bg-warning";
}

$conn->close();
}
?>