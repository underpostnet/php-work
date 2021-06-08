<?php

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------

$dir = "./src/";
$name_domain = "example.com";
$gen_test_doc =
[
  //"-chain-only.pem",
  "-chain.pem",
  "-crt.pem",
  "-key.pem"
];

/*

https://www.php.net/manual/es/function.rmdir.php

public static function delTree($dir) {
   $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
  }

*/

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------

$cont = 1;
foreach($gen_test_doc as $type_cert){

  $path = $dir.$name_domain.$type_cert;

  echo 'generate -> '.$path. "\n";
  $file = fopen($path, "w") or die("Unable to open file!");
  /* crea o sobre escribe */
  fwrite($file, "content ".strval($cont));
  fclose($file);

  $cont++;

}



//------------------------------------------------------------------------------
//------------------------------------------------------------------------------



















//------------------------------------------------------------------------------
//------------------------------------------------------------------------------








 ?>
