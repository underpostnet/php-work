<?php

$dbConfig = json_decode(file_get_contents('../config.json'));
$dbName = "vehiculos";
$tableName = "autos";
$conn = new mysqli($dbConfig->servername, $dbConfig->username, $dbConfig->password, $dbName);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully \n";
$sql = "DROP TABLE {$tableName}";
if ($conn->query($sql) === TRUE) {
  echo "Table {$tableName} deleted successfully";
} else {
  echo "Error deleted table: " . $conn->error;
}
$conn->close();

 ?>
