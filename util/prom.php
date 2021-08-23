<?php


function _avg($valueA, $valueB, $valueC){

 return "( ".$valueA." + ".$valueB." + ".$valueC." ) / 3 = "
 . round(($valueA + $valueB + $valueC)/3, 2) . " \n";

}

function mainProcess(){

  echo "Script Calculo Promedio de 3 valores: \n";

  $valueA = readline("Ingrese Primer valor: ");
  $valueB = readline("Ingrese Segundo valor: ");
  $valueC = readline("Ingrese Tercer valor: ");

  if(is_numeric($valueA) and is_numeric($valueB) and is_numeric($valueC)){
    echo _avg($valueA, $valueB, $valueC);
  }else{
    echo "Alguno de los valores ingresados no es un numero \n";
    mainProcess();
  }

}

mainProcess();


 ?>
