<?php


$last = intval(file_get_contents('../last'));


echo $last. "\n";
$last++;
echo $last. "\n";

$fh = fopen("./last1", 'w') or die("Se produjo un error al crear el archivo");

$content = ("".$last);

fwrite($fh, $content) or die("No se pudo escribir en el archivo");

fclose($fh);


?>
