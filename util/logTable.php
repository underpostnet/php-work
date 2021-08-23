



<?php

// https://stackoverflow.com/questions/7039010/how-to-make-alignment-on-console-in-php

// $mask = "|%5.5s |%-30.30s | x |\n";
// printf($mask, 'Num', 'Title');
// printf($mask, '1', 'A value that fits the cell');
// printf($mask, '2', 'A too long value the end of which will be cut off');

require_once 'Console/Table.php';

$tbl = new Console_Table();

$tbl->setHeaders(array('Language', 'Year'));

$tbl->addRow(array('PHP', 1994));
$tbl->addRow(array('C',   1970));
$tbl->addRow(array('C++', 1983));

echo $tbl->getTable();


$arrayJson = json_decode(file_get_contents('./data/table.json'));

foreach ($arrayJson as $obj) {
  foreach($obj as $key => $value) {
      print "$key=> $value\n";
  }
}



 ?>
