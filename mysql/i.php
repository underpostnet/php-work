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

$codeSelect = 11;
$sql = "UPDATE {$tableName} SET stock = 20 WHERE codigo = {$codeSelect}";

if ($conn->query($sql) === TRUE) {
  echo "updated record successfully \n";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


// sql read data
require_once 'Console/Table.php';
$tbl = new Console_Table();
$headers = [];
$setHeader = true;

$sql = "SELECT * FROM {$tableName} WHERE codigo = {$codeSelect}";
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
