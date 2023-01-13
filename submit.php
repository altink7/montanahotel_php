<?php
/*+----------------------------------------------------------------------------------------------------------------+
 *|here is the used method explained in detail, we use the same way everywhere in the code to make CRUD operations |
 *+----------------------------------------------------------------------------------------------------------------+*/

session_start();
// Include the database configuration file
require_once('dbaccess.php');


// Get the submitted form data
$username=$_POST['username'];
$useremail=$_POST['email'];
//password will be saved as a hash 
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

// Close the connection
$conn->close();
header('Location: login.php')
?>