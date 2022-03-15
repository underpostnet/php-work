<?php

$dbConfig = json_decode(file_get_contents('../config.json'));


$dbName = "docentes";

// Create connection
$conn = new mysqli($dbConfig->servername, $dbConfig->username, $dbConfig->password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully \n";


$tableName = "escuelas";
// sql to create table
$sql = "CREATE TABLE {$tableName} (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50),
capacidad_alumnos INT(10) NOT NULL,
direccion VARCHAR(100)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table {$tableName} created successfully \n";
} else {
  echo "Error creating table: " . $conn->error;
}


$tableName = "profesores";
// sql to create table
$sql = "CREATE TABLE {$tableName} (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(40),
rut VARCHAR(10),
id_escuela INT(6) NOT NULL,
FOREIGN KEY fk_cat(id_escuela)
REFERENCES escuelas(id)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table {$tableName} created successfully \n";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();

 ?>
