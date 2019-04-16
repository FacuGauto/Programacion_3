<?php 
//echo "<h1>Hola</h1>";
//echo "Primer php";
include "./Clases/alumno.php";
//$nombre = "Tomas";
//$nombre = array("nombre" => "Tomas", "Edad"=> 11);
//$array = array();
//$array["Nombre"] = $nombre;
//$array["Edad"] = 23;

try
{

  //$db = new PDO('mysql:host=localhost;dbname=utn;charset=utf8', 'root', '', array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  //$sql = $db->query('SELECT * FROM alumno');

  //var_dump( $sql);
  
  $catidadFilas = $sql->rowCount();


 // echo "cantidad de filas: ".$catidadFilas."<br>";


  $resultado = $sql->fetchall();

  //var_dump($resultado);

  foreach ($resultado as $result) {
    echo $result; 
    echo "<br>";
}

	//foreach($resultado as $fila)
	//{
	  //echo "titulo: ".$fila[0];
	  //echo "-- Año: ".$fila[2];
	  //echo "-- Cantante: ". $fila['cantante'].'<br />';

	//}

} 
catch(PDOException $ex)
{
  echo "error ocurrido!"; 
	echo $ex->getMessage();
}
//echo $nombre;
/*var_dump($array); //Inspecciona obj/variables

class miObj
{
	public $apellido;
}

$miObj = new stdClass();
$miObj->nombre = "Pepe";
$miObj->apellido = "PEPEPEPE";
var_dump($miObj);

$miAlumno = new alumno;
$miAlumno->nombre = "JOSUEEE";
$miAlumno->edad = 25;
var_dump($miAlumno);
*/
//$alumnoDos = new alumno("Matias",125);
//echo $alumnoDos->jsonReturn();
//var_dump($alumnoDos);
?>
