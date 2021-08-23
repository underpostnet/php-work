<?php



/* Observacion: se aproximaran los resultados a 2 decimales de ser nescesario
con la funcion round() de php */

$UF = 27000;
function mainProcess(){
  global $UF;
  echo "Calculadora de UF: \n";
  $value = readline("Ingrese Valor de inmueble en pesos: ");
  if(is_numeric($value)){
    echo "El valor del inmueble es de ".round(($value/$UF), 2)." [UF] \n";
  }else{
    echo "El valor ingresado no es un numero \n";
    mainProcess();
  }
}

mainProcess();










 ?>
