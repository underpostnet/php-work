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






$csvPath = "./data/alquileres.csv";
$separator = ",";
$tableName = "alquileres";



$indRow = 0;
$headers = null;
foreach (explode("\r\n", file_get_contents($csvPath)) as $row) {
  $dataRow = explode($separator, $row);
  if($indRow == 0){
    $headers = $dataRow;
  }else{
    if(count($headers)==count($dataRow)){


      // consulta
      $sql =
      "INSERT INTO {$tableName} (id, id_auto, id_cliente, fecha, descripcion, cantidad_dias, costo_diario)
       VALUES (DEFAULT,
              ".$dataRow[1].",
              ".$dataRow[2].",
              '".$dataRow[3]."',
              '".$dataRow[4]."',
              ".$dataRow[5].",
              ".$dataRow[6]."
            );";
            echo $sql;
            echo "\n";
            if ($conn->query($sql) === TRUE) {
              echo "success insert data \n";
            } else {
              echo "Error creating table: " . $conn->error. " \n";
            }


    }
  }
  $indRow++;
}



// sql read data
require_once 'Console/Table.php';
$tbl = new Console_Table();

$headers = [];
$setHeader = true;
$sql = "SELECT fecha, descripcion, costo_diario FROM {$tableName} WHERE cantidad_dias >= 3 and cantidad_dias <= 5";
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
