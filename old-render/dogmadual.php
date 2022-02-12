<?php

include 'C:/dd/deploy_area/nexodev/modules/util.php';
$dev = false;

function renderPath($uri, $str_data, $lang){

  global $dev;

  $data = json_decode($str_data, true);

  $ssl = "s";
  if($dev){
    $data['url']=$data['url_dev'];
    $ssl = "";
  }

  for($i=0;$i<l($data['path']);$i++){

    if($dev){
      $data['path'][$i]['url'] = $data['path'][$i]['url_dev'];
    }

    /*echo " URI: ".$uri;

    echo "<br><br>";

    echo ($data['url'].$data['path'][$i]['url']);
    echo "<br>";
    echo strtolower((explode("?",("https://".explode("/", $data['url'])[2].$uri))[0]));
    echo "<br>";

    echo "----------- <br>";

    echo ($data['url'].$data['path'][$i]['url'].'index.php');
    echo "<br>";
    echo strtolower((explode("?",("https://".explode("/", $data['url'])[2].$uri))[0]));
    echo "<br>";

    echo "------------------------------ <br>";
    echo "------------------------------ <br>";*/

    if(


      (

      ($data['url'].$data['path'][$i]['url'])
            ==
      strtolower((explode("?",("http".$ssl."://".explode("/", $data['url'])[2].$uri))[0]))

      )

      or

      (

        ($data['url'].$data['path'][$i]['url'].'index.php')
              ==
        strtolower((explode("?",("http".$ssl."://".explode("/", $data['url'])[2].$uri))[0]))


      )


    ){

      //------------------------------------------------------------------------
      //------------------------------------------------------------------------

      $path = $data['path'][$i];

      if($dev){
        $data['url']=$data['url'].$data['path_dev'];
      }

      //------------------------------------------------------------------------
      //------------------------------------------------------------------------

      $h1 = "";

      for($ii=0;$ii<l($path['h1']);$ii++){

        $h1 = $h1."<h1>".$path['h1'][$ii][$lang]."</h1>";

      }

      $h2 = "";

      for($ii=0;$ii<l($path['h2']);$ii++){

        $h2 = $h2."<h2>".$path['h2'][$ii][$lang]."</h2>";

      }

      //------------------------------------------------------------------------
      //------------------------------------------------------------------------

      $global_css = "<style>".file_get_contents("c:/dd/deploy_area/client/style/".$path['main_css']);

      for($ii=0;$ii<l($path['modules']);$ii++){

        // $path['modules'][$ii]

        $global_css = $global_css.file_get_contents($data['path_file']."modules/".$path['modules'][$ii]."/style.css");

      }

      $global_css = $global_css."</style>";

      //------------------------------------------------------------------------
      //------------------------------------------------------------------------


      $global_js = "<script>

      var path = '".$data['url']."';

      ".file_get_contents("c:/dd/deploy_area/client/vanilla.js")
      .file_get_contents("c:/dd/deploy_area/client/util.js");

      for($ii=0;$ii<l($path['modules']);$ii++){

        // $path['modules'][$ii]

        $global_js = $global_js.file_get_contents($data['path_file']."modules/".$path['modules'][$ii]."/main.js");

      }

      $global_js = $global_js."</script>";

      //------------------------------------------------------------------------
      //------------------------------------------------------------------------

      $microdata = '';

      for($ii=0;$ii<l($path['microdata']);$ii++){

        // $path['modules'][$ii]

        $microdata = $microdata.'<script type="application/ld+json">'
        .file_get_contents($data['path_file']."microdata/".$path['microdata'][$ii].".json")
        .'</script>';

      }

      //------------------------------------------------------------------------
      //------------------------------------------------------------------------

      echo ("

      <!DOCTYPE html>

      <html dir='".$data['dir']."' lang='".lang($lang)."'>

        <head>

          <meta charset='".$path['charset']."'>

          <title>".$path['title'][$lang]."</title>

          ".$microdata."

          <meta name ='title' content='".$path['title'][$lang]."' />
          <meta name ='description' content='".$path['description'][$lang]."' />
          <meta name ='theme-color' content = '".$data['color']."' />
          <link rel='canonical' href='".$data['url'].$path['url']."' />
          <link rel='icon' type='image/png' href='".$data['url']."/assets/".$data['favicon']."' />


          <script async src='https://www.googletagmanager.com/gtag/js?id=".$data['googletag']."'></script>

          <script>

          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', '".$data['googletag']."');

          </script>


          <link rel='apple-touch-icon' sizes='180x180' href='".$data['url']."/assets/app/apple-touch-icon.png'>
          <link rel='icon' type='image/png' sizes='32x32' href='".$data['url']."/assets/app/favicon-32x32.png'>
          <link rel='icon' type='image/png' sizes='16x16' href='".$data['url']."/assets/app/favicon-16x16.png'>

          <link rel='icon' type='image/png' sizes='36x36' href='".$data['url']."/assets/app/android-chrome-36x36.png'>
          <link rel='icon' type='image/png' sizes='48x48' href='".$data['url']."/assets/app/android-chrome-48x48.png'>
          <link rel='icon' type='image/png' sizes='72x72' href='".$data['url']."/assets/app/android-chrome-72x72.png'>
          <link rel='icon' type='image/png' sizes='96x96' href='".$data['url']."/assets/app/android-chrome-96x96.png'>
          <link rel='icon' type='image/png' sizes='144x144' href='".$data['url']."/assets/app/android-chrome-144x144.png'>
          <link rel='icon' type='image/png' sizes='192x192' href='".$data['url']."/assets/app/android-chrome-192x192.png'>
          <link rel='icon' type='image/png' sizes='256x256' href='".$data['url']."/assets/app/android-chrome-256x256.png'>
          <link rel='icon' type='image/png' sizes='384x384' href='".$data['url']."/assets/app/android-chrome-384x384.png'>

          <link rel='icon' type='image/png' sizes='16x16' href='".$data['url']."/assets/app/favicon-16x16.png'>
          <link rel='manifest' href='".$data['url']."/assets/app/site.webmanifest'>
          <link rel='mask-icon' href='".$data['url']."/assets/app/safari-pinned-tab.svg' color='".$data['color']."'>

          <meta name='apple-mobile-web-app-title' content='".$path['title'][$lang]."'>
          <meta name='application-name' content='".$path['title'][$lang]."'>
          <meta name='msapplication-config' content='".$data['url']."/assets/app/browserconfig.xml' />
          <meta name='msapplication-TileColor' content='".$data['color']."'>
          <meta name='msapplication-TileImage' content='".$data['url']."/assets/app/mstile-144x144.png'>
          <meta name='theme-color' content='".$data['color']."'>


          <meta property='og:title' content='".$path['title'][$lang]."' />
          <meta property='og:description' content='".$path['description'][$lang]."' />
          <meta property='og:image' content='".$data['url']."/assets/".$path['image']."' />
          <meta property='og:url' content='".$data['url'].$path['url']."' />
          <meta name='twitter:card' content='summary_large_image' />


          <meta name='viewport' content='initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
          <meta name='viewport' content='width=device-width, user-scalable=no' />

          ".$global_css.$global_js."

        </head>

        <body>

          ".$h1.$h2."

          <script  type='text/javascript' async defer>"
          .file_get_contents($data['path_file']."/path/".$path['main_js'])
          ."</script>

        </body>

      </html>

      ");

      //------------------------------------------------------------------------
      //------------------------------------------------------------------------


    }

  }


}




 ?>
