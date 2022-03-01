<?php

$dbConfig = json_decode(file_get_contents('./config.json'));


$dbName = "concesionario";

// Create connection
$conn = new mysqli($dbConfig->servername, $dbConfig->username, $dbConfig->password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully \n";

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
// sql to create table
$tableName = "clientes";
$sql = "CREATE TABLE {$tableName} (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre_completo VARCHAR(40),
rut VARCHAR(10),
direccion VARCHAR(40),
correo VARCHAR(35),
telefono VARCHAR(12)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table {$tableName} created successfully \n";
} else {
  echo "Error creating table: " . $conn->error;
}


//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
// sql to create table
$tableName = "autos";
$sql = "CREATE TABLE {$tableName} (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
marca VARCHAR(20),
modelo VARCHAR(15),
color VARCHAR(20),
anio INT(10),
costo_diario FLOAT(10)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table {$tableName} created successfully \n";
} else {
  echo "Error creating table: " . $conn->error;
}


//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
// sql to create table
$tableName = "alquileres";
$sql = "CREATE TABLE {$tableName} (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_auto INT(10),
id_cliente INT(10),
fecha VARCHAR(10),
descripcion VARCHAR(10),
cantidad_dias INT(10),
costo_diario INT(10)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table {$tableName} created successfully \n";
} else {
  echo "Error creating table: " . $conn->error;
}

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------


$conn->close();

 ?>
