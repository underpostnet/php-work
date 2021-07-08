<?php

$path_email = "c:/xampp/htdocs/online/somosindia/sv/iframes/talleres/respira/api/usersRegister.json";
$path_time = "c:/xampp/htdocs/online/somosindia/sv/iframes/talleres/respira/api/email_24horas.json";

$emails = json_decode(file_get_contents($path_email), true);

$newObj = new \stdClass();
$newObj->name = "name";
$newObj->email = "email";
$newObj->time = json_decode(file_get_contents($path_time), true)["time"];
$newObj->send = false;

array_push($emails, $newObj);

$file = fopen($path_email, "w");
fwrite($file, json_encode($emails, JSON_PRETTY_PRINT));
fclose($file);

 ?>
