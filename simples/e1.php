<?php

function _Add($valueA, $valueB){
 return $valueA." + ".$valueB." = ".($valueA + $valueB)." \n";
}

function _Potency($valueA, $valueB){
  return $valueA."^".$valueB." = ".($valueA**$valueB)." \n";
}

function _Product($valueA, $valueB){
  return $valueA." * ".$valueB." = ".($valueA*$valueB)." \n";
}

function _Divide($valueA, $valueB){
  return $valueA." / ".$valueB." = ".($valueA/$valueB)." \n";
}

function newOp(){
  $op = readline("¿ Realizar una nueva Operación ? (si/no) \n");
  switch ($op) {
    case "si":
        mainProcess();
        break;
    case "no":
        exit();
        break;
    default:
        echo "Opción no valida. \n";
        newOp();
  }
}

function mainProcess(){

  echo "------------------- \n";
  echo "MENU \n";
  echo "------------------- \n";
  echo "1 > Suma \n";
  echo "2 > Potencia \n";
  echo "2 > Multiplicación \n";
  echo "4 > División \n";
  echo "------------------- \n";

  $op = readline("Ingrese Numero de Operación: ");
  $valueA = readline("Ingrese Primer valor: ");
  $valueB = readline("Ingrese Segundo valor: ");

  if(is_numeric($valueA) and is_numeric($valueB)){
    switch ($op) {
      case "1":
          echo _Add($valueA, $valueB);
          break;
      case "2":
          echo _Potency($valueA, $valueB);
          break;
      case "3":
          echo _Product($valueA, $valueB);
          break;
      case "4":
          echo _Divide($valueA, $valueB);
          break;
      default:
          echo "Opción no valida. \n";
    }
  }else{
    echo "Alguno de los valores ingresados no es un numero \n";
  }

  newOp();

}

mainProcess();










 ?>
