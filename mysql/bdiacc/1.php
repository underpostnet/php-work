<?php

$dbConfig = json_decode(file_get_contents('../config.json'));

// se define nombre de la base de datos y la tabla
$dbName = "vehiculos";
$tableName = "autos";

// se conecta a al servidor y se crea la basde de datos
$conn = new mysqli($dbConfig->servername, $dbConfig->username, $dbConfig->password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully \n";
$sql = "CREATE DATABASE {$dbName}";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$conn->close();

// se conecta a al servidor y se crea la basde de datos
$conn = new mysqli($dbConfig->servername, $dbConfig->username, $dbConfig->password, $dbName);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully \n";
$sql = "CREATE TABLE {$tableName} (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
marca VARCHAR(18) NOT NULL,
modelo VARCHAR(12) NOT NULL,
color VARCHAR(15) NOT NULL,
anio INT(10) NOT NULL,
precio FLOAT(10) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
  echo "Table {$tableName} created successfully \n";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();

 ?>
