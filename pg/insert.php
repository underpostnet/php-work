<?php






$dbConfig = json_decode(file_get_contents('./config.json'));
$dbconn = pg_connect("
host={$dbConfig->host}
port={$dbConfig->port}
dbname=inventario
user={$dbConfig->user}
password={$dbConfig->password}
");


$csvPath = "./c4_bbdd.csv";
$separator = ",";




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
      "INSERT INTO equipos (id, marca, modelo, anio, costo, precioventa, cantidad)
       VALUES (DEFAULT,
              '".$dataRow[0]."',
              '".$dataRow[1]."',
              '".$dataRow[2]."',
              ".str_replace('.', '', $dataRow[3]).",
              ".str_replace('.', '', $dataRow[4]).",
              ".$dataRow[5]."
            );";
            echo $sql;
            echo "\n";
       $result = pg_query($dbconn, $sql);


    }
  }
  $indRow++;
}


pg_close($dbconn);




 ?>
