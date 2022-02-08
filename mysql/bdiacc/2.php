<?php


$dbConfig = json_decode(file_get_contents('../config.json'));

// se define nombre de la base de datos y la tabla
$dbName = "vehiculos";
$tableName = "autos";

// se conecta a al servidor y se crea la basde de datos
$conn = new mysqli($dbConfig->servername, $dbConfig->username, $dbConfig->password, $dbName);

// se insertan archivos iterando el la data csv
try {
    if (($gestor = fopen("./data.csv", "r")) !== false) {
        $row = 0;
        while (($datos = fgetcsv($gestor, 0, ",")) !== false) {
          if($row > 0){
            $sql = "INSERT INTO {$tableName} (marca,modelo,color,anio,precio)
            VALUES (
              '".$datos[0]."',
              '".$datos[1]."',
              '".$datos[2]."',
              ".$datos[3].",
              ".$datos[4]."
            )";

            if ($conn->query($sql) === TRUE) {
              echo "New record created successfully \n";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
          $row++;
        }
        fclose($gestor);
    }
} catch (\Exception $e) { echo $e; }


// imprimir por pantalla los datos agregados
// consultando a la base de datos

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
