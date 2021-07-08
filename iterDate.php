<?php


include 'C:/xampp/htdocs/online/somosindia/sv/iframes/talleres/respira/api/email24horas.php';
$data_respira = json_decode(file_get_contents('C:/xampp/htdocs/online/somosindia/sv/iframes/talleres/respira/api/usersRegister.json'), true);





foreach ($data_respira as $data) {

 echo $data["name"];
 echo "\n";

 //current timestamp * 1000 para JS
 echo time();
 echo "\n";

 $fecha = new DateTime();
 $fecha->setTimestamp($data["time"]/1000);
 var_dump($fecha);



}

 ?>
