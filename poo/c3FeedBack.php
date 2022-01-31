<?php

/*
MUESTRA LOS ERRORES
Pueden utilizar estas lineas en caso no les muestre los errores del servidor
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//============================================================================================


// CLASE ABSTRACTA

/*

Una clase que declara la existencia de métodos pero no la implementación de dichos métodos (o sea, las llaves { } y las sentencias entre ellas), se considera una clase abstracta.

Una clase abstracta puede contener métodos no-abstractos pero al menos uno de los métodos debe ser declarado abstracto.

Para declarar una clase o un metodo como abstractos, se utiliza la palabra reservada abstract.

https://www.php.net/manual/es/language.oop5.abstract.php

*/

abstract class Persona
{

   // mis metodos abastractos
   abstract protected function getYear();
   abstract protected function getInfoAlumno($info);

   // mi metodo normal
   public function printYear() {
      print $this->getYear();
   }
}

class Alumno extends Persona
{
	protected function getYear() {
      return " Cursa Tercero Medio, Año 2022 <br>";
    }
	public function getInfoAlumno($info) {
		return "Alumno: <b> {$info} </b> - Cursa 7 asignaturas  / ";
	}
}




$alumno1 = new Alumno;


// muestra información del alumno
echo $alumno1->getInfoAlumno('Marco Herrera');

// muestra el año
$alumno1->printYear();


//=======================================================================


// TRAIT

/*

A modo de ejemplo hice todo en un solo archivo

*/

// esta clase la podemos poner en un archivo persona.php

class Persona
{
       public $nombre;
       public $apellido;
       public $rut;
       public $direccion;

        public function __construct($rut,$nombre,$apellido,$direccion)
    	{
    		$this->rut=$rut;
    		$this->nombre=$nombre;
    		$this->apellido=$apellido;
    		$this->direccion=$direccion;
    	}

       public function getNombre(){
           print $this->nombre." ".$this->apellido."<br/>";
       }

}


/* para este ejemplo defiiremos dos Trait */

// 1. este trait   lo podemos poner en un archivo actividad_extra.php
trait actividad_extra
{
    public function actividad_extra()
    {
        echo " Actividad Extra: Deportes  <br/>";
    }
}


// 2. este trait   lo podemos poner en un archivo tipo_actividad.php
trait tipo_actividad
{
	public function tipo_actividad(){
	echo " Tipo Actividad: Natación <br/>";
	}
}

/*

si definimos las clases en archivos diferentes podemos  incluir en mi archivo principal que podria ser index.php   de esta forma

("persona.php");
("actividad_extra.php");
("tipo_actividad.php");

*/



//definimos nuestra clase incio heredada de la clase base
class actividad_persona extends persona {

	// dentro de la case indicamos que vamos a utilizar los traits
	use actividad_extra;
	use tipo_actividad;
}


// creamos nuestro objeto actividad_persona
$actividad_persona = new actividad_persona("10.123.456-7","Jorge","Montero","Los Alamos 123");

//llamamos al metodo propio de la clase persona para muestre el primer echo
$actividad_persona->getNombre();

// invocamos el trait actividad_extra  y muestra la actividad que realiza
$actividad_persona->actividad_extra();


// invocamos el trait tipo_actividad  y muestra el tipo de actividad
$actividad_persona->tipo_actividad();


/*

Resultado:

Jorge Montero
Actividad Extra: Deportes
Tipo Actividad: Natación

*/




//=======================================================================


// CLASES ANONIMAS

class plan_estudio {
   private $asignaturas;

	//método que define las asigntauras del plan de estudio
   public function asignar_asignaturas ($asignaturas) {
      $this->asignaturas = $asignaturas;
   }

//Método que muestra las asignaturas del nivel deestudio
   public function mostrarAsignaturas(){

      echo 'Asignaturas: ',$this->asignaturas->detalle_asignaturas();
   }
}


$plan_estudio = new plan_estudio();
//definición de la figura (objeto) manipulado

//utilización de la ayuda de una clase anónima.
$plan_estudio->asignar_asignaturas (new class("Luis Pérez","M3") {

	  //argumentos pasados al constructor atributos
      private $nombre;
      private $nivel;

       //métodos
      public function __construct ($nombre, $nivel) {
         $this->nombre = $nombre;
         $this->nivel = $nivel;
      }

	  // metodo que muestra las asignaturas
      public function detalle_asignaturas () {

         if( $this->nivel == 'M3') //Tercero Medio
         {
             $Asignaturas = array("Inglés", "Matemáticas", "Física");
         }

         else if( $this->nivel == 'M4') //Cuarto Medio
         {
             $Asignaturas = array("Química", "Filosofía", "Artes Visuales");
         }

         return  $this->nombre." - ".$this->nivel." - ". implode(", ", $Asignaturas);
      }
});


//Visualización de las asignaturas
 echo $plan_estudio->mostrarAsignaturas();



//=======================================================================

// SOBRECARGA


// CREAMOS LA Clase persona con sus atributos, contructor y metodo
class Persona
{

	private $id;
	private $nombre;
	private $apellido;
	private $email;


	public function __construct($id,$nombre,$apellido,$email)
	{
		$this->id=$id;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->email=$email;
	}

	public function getNombreCompleto()
	{
		return $this->nombre." ".$this->apellido;
	}

}


// Creamos la clase usuario que hereda las caracteristicas de Persona
class Usuario extends Persona
{
	private $perfil;


	// heredamos el cosntructor del padre (Persona)
	public function __construct($id,$nombre,$apellido,$email)
	{
		parent:: __construct($id,$nombre,$apellido,$email);
	}


	// definimos los metodos de usuario, set perfil
    public function setPerfil($perfil)
	{
		$this->perfil =  $perfil;
	}

	// definimos los metodos de usuario,get perfil
	 public function getPerfil()
	{
		return $this->perfil;
	}


	// SOBRECARGAMOS el metodo  getNombreCompleto del padre (persona) ene ste caso invocando otro metodo (perfil)
	public function getNombreCompleto()
	{
		return parent::getNombreCompleto().", ".$this->getPerfil();
	}

}


//sobrecarga de metodos


// creamos un objeto persona
$persona1 = new Persona(1,"Juan","Romero","jromero@iacc.cl");

// crsmos un objeto usuario
$usuario1 = new Usuario(1,"Juan","Rivas","jrivas@iacc.cl");

// asignamos un perfil al usuario
$usuario1->setPerfil("Apoderado");


// obtenemos el nombre completo de la persona
echo "<br>Alumno: ".$persona1->getNombreCompleto()."<br>";

// obtenemos el nombre completo del usuario con el metodo sobrecargado  que asugna el perfil
echo "<br>".$usuario1->getNombreCompleto()."<br>";


//=================================================


// METODO MAGICO
// PARA ESTE CASO USAMOS __get

class InfoLaboral
{

/* Propiedades */
private $empresa = "Aguas Andinas";
public  $cargo = "Jefe de Planta";
public  $direccion = "Pudahuel";
public  $telefono = "2555666";

public function __get($propiedad)
{
   return $this->$propiedad;

 }

}

$job1 = new InfoLaboral();

print $job1->empresa."<br>";
print $job1->cargo."<br>";



//================================================



// PALABRA CLAVE FINAL


class ClaseColegio {

   public function clase_regular() {
       echo "Las clases en el colegio son de Lunes a Viernes - ClaseColegio::clase_regular() - <br>";
   }

   final public function clase_modalidad() {
       echo "Las clases en el colegio serán todas online en 2022 de forma obligatoria -  ClaseColegio::clase_modalidad() <br>";
   }
}

class ClaseAlumno extends ClaseColegio {


	// sobre escribe la clase test
	public function clase_regular() {
       echo "Las clases de este alumno son Lunes, Martes y Jueves - ClaseAlumnos::clase_regular() <br>";
   }


	// no puede sobreescribir la clase moreTesting por que esta definisa como final  asi que al llamar este metodo da ERROR para quye funcione este metodo no debe existir (comentar)

	/*
	public function clase_modalidad() {
       echo "No hay clases en todo el año   - llamada a ClaseAlumno::clase_modalidad()\n";
   }
   */

}


$asistencia_clase = new ClaseAlumno();

// metodo que no usa la palabra final
echo $asistencia_clase ->clase_regular();

// metodo que usa la palabra final -  Devuelve un error Fatal si se descomenta en ClaseAlumno:
echo $asistencia_clase ->clase_modalidad();


 ?>
