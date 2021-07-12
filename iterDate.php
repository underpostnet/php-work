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

 $fecha->format('Y-m-d H:i:s');



}

/*

echo boolval(true) ? 'true' : 'false';


object(DateTime)#1 (3) {
["date"]=>
string(26) "2021-07-11 18:42:51.000000"
["timezone_type"]=>
int(3)
["timezone"]=>
string(10) "US/Pacific"
}



*/



 ?>
