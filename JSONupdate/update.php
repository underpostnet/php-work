<?php

try {

    $file = fopen("./data/data.json", "w");
    $content = str_replace ( '\"', "'", file_get_contents( 'php://input' ));
    fwrite($file, $content);
    fclose($file);

    echo "true";

} catch (\Exception $e) {

    echo "false";
}



 ?>
