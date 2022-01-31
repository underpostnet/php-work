<?php





$dbConfig = json_decode(file_get_contents('./config.json'));
$dbconn = pg_connect("
host={$dbConfig->host}
port={$dbConfig->port}
dbname=inventario
user={$dbConfig->user}
password={$dbConfig->password}
");


require_once 'Console/Table.php';
$tbl = new Console_Table();
$headers = [];
$setHeader = true;

$sql = "UPDATE equipos SET anio = (anio-5) WHERE anio = 2018 or anio = 2019;";
$result = pg_query($dbconn, $sql);

$sql = "SELECT * FROM equipos";
$result = pg_query($dbconn, $sql);

if( pg_num_rows($result) > 0 )
{
  while( $obj = pg_fetch_object($result) ){
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
}

echo $tbl->getTable();

pg_close($dbconn);


 ?>
