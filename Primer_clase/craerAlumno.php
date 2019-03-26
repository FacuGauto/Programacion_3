<?php 
require_once "alumnos.php";

//var_dump($_GET);
//var_dump($_POST);
//var_dump($_REQUEST);

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$dni = $_POST['dni'];
$legajo = $_POST['legajo'];	
$path = $_POST['path'];	

$miAlumno = new Alumno($nombre,$edad,$dni,$legajo);

echo $miAlumno->retornarJson();

$miAlumno->guardarArchivo($path);

//$miAlumno->guardarJson($path);


//var_dump($miAlumno);
?>