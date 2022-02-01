<?php

$dbConfig = json_decode(file_get_contents('./config.json'));


$dbName = "articulos_de_limpieza";
$tableName = "productos";

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
$headers = [];
$setHeader = true;

$sql = "SELECT * FROM {$tableName} WHERE
codigo = 5 or
codigo = 7 or
codigo = 3 or
codigo = 6 or
codigo = 11
";

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


$sql = "DELETE FROM {$tableName} WHERE codigo = 5";
if ($conn->query($sql) === TRUE) {
  echo "deleted record successfully \n";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "DELETE FROM {$tableName} WHERE codigo = 7";
if ($conn->query($sql) === TRUE) {
  echo "deleted record successfully \n";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$tbl = new Console_Table();
$headers = [];
$setHeader = true;

$sql = "SELECT * FROM {$tableName} WHERE
codigo = 5 or
codigo = 7 or
codigo = 3 or
codigo = 6 or
codigo = 11
";

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
