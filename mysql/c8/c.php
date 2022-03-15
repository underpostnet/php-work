<?php

$dbConfig = json_decode(file_get_contents('../config.json'));
$dbName = "docentes";
$tableName = "escuelas";

// Create connection
$conn = new mysqli($dbConfig->servername, $dbConfig->username, $dbConfig->password, $dbName);


$sql = "UPDATE {$tableName} SET capacidad_alumnos = 100 WHERE nombre = 'informatica'";

if ($conn->query($sql) === TRUE) {
  echo "Table {$tableName} created successfully \n";
} else {
  echo "Error creating table: " . $conn->error;
}


// sql read data
require_once 'Console/Table.php';
$tbl = new Console_Table();
$headers = [];
$setHeader = true;
$sql = "SELECT * FROM {$tableName}";
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
