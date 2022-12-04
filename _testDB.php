<?php
require_once('dbaccess.php');

$db_obj = new mysqli($host, $user, $password, $database);
if ($db_obj->connect_error) {
    echo "Connection Error: " . $db_obj->connect_error;
    exit();
}
$sql = "SELECT * FROM users";
$result = $db_obj->query($sql);
echo "<pre>" . print_r($result->fetch_array(), true) . "</pre>";

$sql = "SELECT * FROM users";
$result = $db_obj->query($sql);
while ($row = $result->fetch_array()) { //_assoc works, _object not
    echo "id: " . $row['id'] . "<br>";
    echo "username: " . $row['username'] . "<br>";
    echo "password: " . $row['password'] . "<br>";
    echo "useremail: " . $row['useremail'] . "<br>";
    echo "<br>";
}

?>