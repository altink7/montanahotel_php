<?php
session_start();
require_once('dbaccess.php');

$username=$_POST['username'];
$useremail=$_POST['email'];
$password  =password_hash($_POST['password'], PASSWORD_DEFAULT);

// Connect to the database
$conn = new mysqli($host, $user, $password_db, $database);

// Prepare the INSERT statement to insert a new record into the "users" table
$stmt = $conn->prepare("INSERT INTO users (username, useremail, password, admin, status) VALUES (?, ?, ?, 0, 1)");

// Bind the values to the placeholders in the query
$stmt->bind_param("sss", $username, $useremail, $password);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement
$stmt->close();

$conn->close();
header('Location: login.php')
?>