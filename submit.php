<?php

$name=$_POST['name'];
$email=$_POST['email'];
$country=$_POST['country'];
$address=$_POST['address'];
$password  =$_POST['password'];


$servername= 'localhost';
$username = 'root';
$password = '';
$dbname = 'montanadb';

//$mysqli = new mysqli("localhost", "username", "password", "dbname");

$conn = new mysqli($servername, $username, $password, $dbname);
echo "Connection successful!" . "<bc>";
$sql = "INSERT INTO kunde (name, email, country, address, password) VALUES ('$name', '$email','$country','$address','$password')";

if($conn->query($sql) === TRUE){
 echo "New record created successfully";
} else {
 echo "<bc> Error: " .  $sql . "<br>" . $conn->error;
}

$conn->close();
?>