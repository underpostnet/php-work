<?php


// se define clase persona natural
// Las clases y métodos abstractos son cuando la
// clase principal tiene un método con nombre,
// pero necesita su(s) clase(s) secundaria(s)
// para completar las tareas.
abstract class PersonaNatural {

  public $nombre;
  public $apellido;
  public $rut;
  public $direccion;

  public function __construct( $nombre,
                        $apellido,
                        $rut,
                        $direccion) {

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->rut = $rut;
        $this->direccion = $direccion;
  }

  public function __destruct() {
    // PHP will automatically call this function at the end of the script.
   echo " -> destruct de persona natural \n";
 }


}

// se define estudiante ereda a persona natural
class Estudiante extends PersonaNatural  {

  private $year;
  private $asignaturas;
  private $actividad_extra;

  function setYear($year){
    $this->year = $year;
  }
  function setAsignatura($asignaturas){
    $this->asignaturas = $asignaturas;
  }
  function setActividadExtra($actividad_extra){
    $this->actividad_extra = $actividad_extra;
  }


}

// se define apoderado hereda de persona natural y contiene
// en su atributo un objeto estudiante
class Apoderado extends PersonaNatural  {

  private $estudiante;
  private $estudiantes;

  function setEstudiante($estudiante){
    $this->estudiante = $estudiante;
  }

  function getEstudiante(){
    return $this->estudiante;
  }

  function setEstudiantes($estudiantes){
    $this->estudiantes = $estudiantes;
  }


   // los metodos finales previene que se puedan sobreescibir
   // las clases finales evitan la herencia
   final public function __get($value){
          echo "Propiedad '".$value."' no existe por defecto se iterante estudiantes: \n";
          foreach ($this->estudiantes as $objEstudiante) {
            echo " nombre estudiante: ".$objEstudiante->nombre. " \n";
          }
   }

}

// se instancia estudiante en el objeto estudiante
$estudiante = new Estudiante("francisco", "verdugo", "18935903-9", "Alvarez 445");
$estudiante->setYear(2020);
$estudiante->setAsignatura(["programacion", "redes"]);
$estudiante->setActividadExtra("estadistica");

// se instancia apoderado en el objeto apoderado
$apoderado = new Apoderado("ayleen", "bertini", "18345343-9", "Alvarez 445");
// se setea el objeto estudiante en el atributo estudiante de apoderado
$apoderado->setEstudiante($estudiante);

var_dump($estudiante);

var_dump($apoderado);




// Los rasgos (traits) se utilizan para declarar métodos que se pueden utilizar
// en varias clases. Los rasgos pueden tener métodos y métodos
// abstractos que se pueden usar en varias clases, y los métodos
// pueden tener cualquier modificador de
// acceso (público, privado o protegido).
trait gestionInstancias {
  public function getNombreEstudianteDeApoderado()
  {

    global $apoderado;
    // en PHP Las funciones anónimas están implementadas utilizando la clase Closure.
    // https://www.php.net/manual/es/functions.anonymous.php
    $func  = function() use (&$apoderado)
    {
        echo 'Nombre del estudiante: '. $apoderado->getEstudiante()->nombre ." \n";
    };
    $func();

  }
};


class Test {
  use gestionInstancias;
}

$test = new Test();
$test->getNombreEstudianteDeApoderado();

// test para sobre carga
// La sobrecarga en PHP ofrece los medios para
// crear dinámicamente propiedades y métodos.
// Estas entidades dinámicas se procesan por
// los métodos mágicos que se pueden establecer
// en una clase para diversas acciones.
class MethodTest
{
    public function __call($name, $arguments)
    {
        global $apoderado;
        // Nota: el valor $name es sensible a mayúsculas.
        echo "Llamando al método de objeto '$name' "
             . implode(', ', $arguments). "\n";

             echo "nombre Apoderado :".$apoderado->nombre." \n";
    }

    public static function __callStatic($name, $arguments)
    {
        global $apoderado;
        // Nota: el valor $name es sensible a mayúsculas.
        echo "Llamando al método estático '$name' "
             . implode(', ', $arguments). "\n";

             echo "nombre Apoderado :".$apoderado->nombre." \n";
    }
}

$obj = new MethodTest;
$obj->nombreApoderado('en contexto de objeto');

MethodTest::nombreApoderado('en contexto estático');


// se iteran estudiantes en un metodo magico final
$apoderado->setEstudiantes(
  [$estudiante, $estudiante, $estudiante]
);
$apoderado->estudiantes;


// al finalizar el script se ejecutan los destructores
// de persona natural


 ?>
