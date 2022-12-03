<?php
# Connection Credentials
$host = "localhost";
$user = "root";
$password = "";
$dbName = "system_welfare_prototype";
$tableName = "users";

# Connection Command
$conn = mysqli_connect($host, $user, $password, $dbName) or die("Unable to connect " . $conn->connect_error);
