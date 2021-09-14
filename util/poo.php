<?php


echo "\n";
echo "funcion: var_dump() -> ";
var_dump($obj = (object) array('1' => 'foo'));

echo "\n";
echo "funcion: intval() -> ";
echo intval('889');

echo "\n";
echo "funcion: is_numeric() -> ";
echo is_numeric('asd') ? 'true' : 'false';

echo "\n";
echo "funcion: str_replace() -> ";
echo str_replace(
  array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U"), "", "Hello World of PHP"
);

echo "\n";
echo "funcion: implode() -> ";
echo implode(",", array('apellido', 'email', 'teléfono'));


 ?>
