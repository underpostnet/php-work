<?php





$dbConfig = json_decode(file_get_contents('./config.json'));
$dbconn = pg_connect("
host={$dbConfig->host}
port={$dbConfig->port}
dbname={$dbConfig->dbname}
user={$dbConfig->user}
password={$dbConfig->password}
");



$sql = "SELECT * FROM users";

$result = pg_query($dbconn, $sql);

if( pg_num_rows($result) > 0 )
{

  while( $obj = pg_fetch_object($result) ){

      var_dump($obj);

  }

}



pg_close($dbconn);


 ?>
