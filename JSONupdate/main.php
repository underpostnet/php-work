<?php



$json = json_decode(file_get_contents('./test.json'));

foreach ($json as $data) {
  $data->a = false;
}

$file = fopen('./test.json', "w");
fwrite($file, json_encode($json, JSON_PRETTY_PRINT));
fclose($file);









 ?>
