<?php


// se define clase persona natural
class PersonaNatural {

  public $nombre;
  public $apellido;
  public $rut;
  public $direccion;

  function __construct( $nombre,
                        $apellido,
                        $rut,
                        $direccion) {

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->rut = $rut;
        $this->direccion = $direccion;
  }

  function __destruct() {
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

  function setEstudiante($estudiante){
    $this->estudiante = $estudiante;
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


// al finalizar el script se ejecutan los destructores
// de persona natural


 ?>
