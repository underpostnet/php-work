<?php








$dbConfig = json_decode(file_get_contents('./config.json'));
$dbconn = pg_connect("
host={$dbConfig->host}
port={$dbConfig->port}
dbname=inventario
user={$dbConfig->user}
password={$dbConfig->password}
");



$sql = 'TRUNCATE TABLE equipos RESTART IDENTITY;';
$result = pg_query($dbconn, $sql);

pg_close($dbconn);









 ?>
