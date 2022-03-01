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


// sql read data
require_once 'Console/Table.php';






$tbl = new Console_Table();
$tableName = "autos";
echo " tabla ".$tableName ."\n";
$headers = [];
$setHeader = true;
$sql = "SELECT marca, modelo, anio FROM {$tableName}";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($obj = $result->fetch_assoc()) {
    $row = [];
    foreach($obj as $key => $value) {
        $setHeader ?
        array_push($headers, $key):
        null;
        array_push($row, $value);
    }
    if($setHeader){
      $setHeader = false;
      $tbl->setHeaders($headers);
    }
    $tbl->addRow($row);
  }
} else {
  echo "0 results \n";
}



echo $tbl->getTable();









$tbl = new Console_Table();
$tableName = "clientes";
echo " tabla ".$tableName ."\n";
$headers = [];
$setHeader = true;
$sql = "SELECT nombre_completo, rut, correo FROM {$tableName}";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($obj = $result->fetch_assoc()) {
    $row = [];
    foreach($obj as $key => $value) {
        $setHeader ?
        array_push($headers, $key):
        null;
        array_push($row, $value);
    }
    if($setHeader){
      $setHeader = false;
      $tbl->setHeaders($headers);
    }
    $tbl->addRow($row);
  }
} else {
  echo "0 results \n";
}



echo $tbl->getTable();









$tbl = new Console_Table();
$tableName = "alquileres";
echo " tabla ".$tableName ."\n";
$headers = [];
$setHeader = true;
$sql = "SELECT fecha, descripcion, costo_diario
FROM {$tableName}
WHERE cantidad_dias <= 4";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($obj = $result->fetch_assoc()) {
    $row = [];
    foreach($obj as $key => $value) {
        $setHeader ?
        array_push($headers, $key):
        null;
        array_push($row, $value);
    }
    if($setHeader){
      $setHeader = false;
      $tbl->setHeaders($headers);
    }
    $tbl->addRow($row);
  }
} else {
  echo "0 results \n";
}



echo $tbl->getTable();





$conn->close();

 ?>
