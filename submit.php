<?php
session_start();
require_once('dbaccess.php');

$username=$_POST['username'];
$useremail=$_POST['email'];
$password  =password_hash($_POST['password'], PASSWORD_DEFAULT);

$conn = new mysqli($host, $user, $password_db, $database);

echo "Connection successful!" . "<bc>";
$sql = "INSERT INTO users (username, useremail, password, admin, status) VALUES ('$username', '$useremail','$password', 0, 1)";

if($conn->query($sql) === TRUE){
 echo "New record created successfully";
} else {
 echo "<bc> Error: " .  $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: index.php')
?>