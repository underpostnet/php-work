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

foreach($gen_test_doc as $type){
  $path = $dir.$name_domain.$type;
  if(file_exists($path)){
    if($type=="-chain.pem"){
      $ssl_dir = $dir."ssl/"."ca_bundle.crt";
      echo 'generate -> '.$path." to ".$ssl_dir. "\n";
    }
    if($type=="-crt.pem"){
      $ssl_dir = $dir."ssl/"."crt.crt";
      echo 'generate -> '.$path." to ".$ssl_dir. "\n";
    }
    if($type=="-key.pem"){
      $ssl_dir = $dir."ssl/"."key.key";
      echo 'generate -> '.$path." to ".$ssl_dir. "\n";
    }
    // echo "rename   -> ".$path." to ".$ssl_dir. "\n";
    rename($path, $ssl_dir);
  }
}


//------------------------------------------------------------------------------
//------------------------------------------------------------------------------








 ?>
