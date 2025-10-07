<?php
include "db.connect.php";

$f_name = $_POST['f_name'];
$m_name = $_POST['m_name'];
$l_name = $_POST['l_name'];
$address = $_POST['address'];
$email_address = $_POST['email_address']; 
$date_enrolled = $_POST['date_enrolled']; 

if (empty($f_name) || empty($m_name) || empty($l_name) || empty($address)|| empty($email_address || empty($date_enrolled))) { 
die("All fields are required."); 

}

$stmt = $conn->prepare(query: "INSERT INTO tblstudents (f_name, m_name, l_name, address, email_address, date_enrolled) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param(types: "ssssss", var: &$f_name, vars: &$m_name, $l_name, $address, $email_address, $date_enrolled);

if ($stmt->execute()) { 
echo "Student added successfully! <a href='../index.php'>Go back</a>"; 
} else { 
echo "Error: " .  $stmt->error; 

$stmt->close(); 
$conn->close();
}
?>