<?php

$dbConfig = json_decode(file_get_contents('./config.json'));

// Create connection
$conn = new mysqli($dbConfig->servername, $dbConfig->username, $dbConfig->password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully \n";


$dbName = "articulos_de_limpieza";

// Create database
$sql = "CREATE DATABASE {$dbName}";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}


$conn->close();

 ?>
