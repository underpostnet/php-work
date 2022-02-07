<?php
try {
    $fila = 0;
    // apertura de archivo
    if (($gestor = fopen("./data.csv", "r")) !== false) {
        $mainData = [];
        $content = "";
        // lectura de archivo
        while (($datos = fgetcsv($gestor, 0, ";")) !== false) {
            if($fila > 0){
              // edición de archivo
              $datos[4] = readline("Ingrese nueva cantidad de almunos asignados para el docente {$datos[0]}:");
            }
            array_push($mainData, $datos);
            $content = $content . implode(";", $datos)."\r\n";
            $fila++;
        }
        // cierre de archivo
        fclose($gestor);
        echo "\n nuevo csv generado: \n\n";
        echo $content;
        $file = fopen("./data.csv", "w");
        // se crea un nuevo archivo editando el anterior
        fwrite($file, $content);
        fclose($file);
    }
} catch (\Exception $e) { echo $e; }
 ?>
