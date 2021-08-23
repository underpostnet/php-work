<?php

require_once 'Console/Table.php';
$tbl = new Console_Table();

$arrayJson = json_decode(file_get_contents('./data/table.json'));
$header = [];
$setHeader = true;

foreach ($arrayJson as $obj) {

  $row = [];
  foreach($obj as $key => $value) {
      // print "$key=> $value\n";
      array_push($row, $value);
      ($setHeader) ? array_push($header, $key) : null;
  }
  $tbl->addRow($row);

  if($setHeader){
    $tbl->setHeaders($header);
    $setHeader = false;
  }

}

echo $tbl->getTable();


 ?>
