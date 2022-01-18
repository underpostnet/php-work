<?php

class Fruit {
  public $name;
  public $color;

  function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
  function get_name() {
    return $this->name;
  }
  function intro() {
    echo "The fruit is {$this->get_name()} and color {$this->color} \n";
  }
  function __destruct() {
    // PHP will automatically call this function at the end of the script.
   echo "The fruit is {$this->get_name()}";
 }
}

class Strawberry extends Fruit {
  public function message() {
    echo "Am I a fruit or a berry? ";
  }
}

$strawberry = new Strawberry("Strawberry", "red");
$strawberry->message();
$strawberry->intro();

var_dump($strawberry);


 ?>
