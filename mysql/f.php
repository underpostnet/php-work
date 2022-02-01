<?php

$dbConfig = json_decode(file_get_contents('./config.json'));
$dbName = "articulos_de_limpieza";
$tableName = "productos";

// Create connection
$conn = new mysqli($dbConfig->servername, $dbConfig->username, $dbConfig->password, $dbName);

// sql read data
require_once 'Console/Table.php';
$tbl = new Console_Table();
$headers = [];
$setHeader = true;
$sql = "SELECT codigo, descripcion FROM {$tableName} WHERE precio>5000";
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
