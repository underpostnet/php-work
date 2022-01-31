<?php

$csvPath = "./c4_bbdd.csv";
$separator = ",";




$indRow = 0;
$headers = null;
foreach (explode("\r\n", file_get_contents($csvPath)) as $row) {
  $dataRow = explode($separator, $row);
  if($indRow == 0){
    $headers = $dataRow;
    echo "read header row -> ".$row. " \n";
  }else{
    if(count($headers)==count($dataRow)){
      echo "read data row -> ".$row. " \n";
      $indCol = 0;
      foreach ($dataRow as $col) {
        echo $headers[$indCol]." -> ".$col. " \n";
        $indCol++;
      }
    }else{
      echo "invalid length row \n";
    }
  }
  $indRow++;
}












 ?>
