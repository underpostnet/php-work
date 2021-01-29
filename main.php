<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$last = intval(file_get_contents('./last'));

$cont = 0;
$sub_cont = 0;

function listar_directorios_ruta($ruta){

  global $reader;
  global $cont;
  global $sub_cont;
  global $last;

  // abrir un directorio y listarlo recursivo
  if (is_dir($ruta)) {
    if ($dh = opendir($ruta)) {
      while (($file = readdir($dh)) !== false) {
        //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio

         echo "\n\n" . '-> '.$ruta.$file. "\n";

        //mostraría tanto archivos como directorios
        //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file);




        //----------------------------------------------------------------------
        //----------------------------------------------------------------------



        $excel = false;
        $list_test = explode('.',$file);

        for($i=0;$i<count($list_test);$i++){

          if(($list_test[$i]=='xls') or ($list_test[$i]=='xlsx')){

            // echo 'ext -> '.$list_test[$i].'<br>';
            $cont++;

            if($cont>$last){

              $excel = true;
              $sub_cont++;

            }

            break;

          }

        }

        if($excel){

          $spreadsheet = $reader->load(($ruta.$file));

          //                       ->getSheet(0)
          $sheetData = $spreadsheet->getSheetByName('ENFERMERIA')->toArray();

          $i_excel = 1;
          foreach ($sheetData as $t) {

            if($i_excel==4){

              echo "RUT -> ".$t[6]. "\n";

              break;

            }

            $i_excel++;

          }

          echo " end cont -> ".$cont." ---------------- " . "\n" . "\n";

          if($sub_cont==10){

            $fh = fopen("./last", 'w') or die("Se produjo un error al crear el archivo");

            $content = ("".$cont);

            fwrite($fh, $content) or die("No se pudo escribir en el archivo");

            fclose($fh);

            exit;

          }

        }

        //----------------------------------------------------------------------
        //----------------------------------------------------------------------








        if (is_dir($ruta . $file) && $file!="." && $file!=".."){
          //solo si el archivo es un directorio, distinto que "." y ".."
          //echo "<br>Directorio: $ruta$file";

          echo "\n" ."\n" .'<------- folder '.$file.'--------->' ."\n" ."\n";

          listar_directorios_ruta($ruta . $file . "/");

        }
      }
      closedir($dh);
    }
  }else
  echo "<br>No es ruta valida";
}

listar_directorios_ruta("./fichas/");

?>
