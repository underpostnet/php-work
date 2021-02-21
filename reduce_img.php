<?php

function reduceImage($path) {
  switch(mime_content_type($path)) {
    case 'image/png':
      $img = imagecreatefrompng($path);
      // 0 -> 9 nivel de compresion
      imagepng($img,$path,9);
      echo $path . "\n";
      break;
    case 'image/jpeg':
      $img = imagecreatefromjpeg($path);
      // 100% -> 0 % de calidad
      imagejpeg($img,$path,20);
      echo $path . "\n";
      break;
    default:
      echo 'formato no valido' . "\n";
  }
}

function listar_directorios_ruta($ruta){

  if (is_dir($ruta)) {
    if ($dh = opendir($ruta)) {
      while (($file = readdir($dh)) !== false) {

        reduceImage(($ruta . $file));

        /*


        if(explode('.', $path)[(count(explode('.', $path))-1)]=='png'){

        }


        */

        if (is_dir($ruta . $file) && $file!="." && $file!=".."){

          listar_directorios_ruta($ruta . $file . "/");

        }

      }
      closedir($dh);
    }
  }else
  echo "No es ruta valida \n";
}

listar_directorios_ruta("./reduce_img_test/");

?>
