<?php 
require_once "alumnos.php";

//var_dump($_GET);
//var_dump($_POST);
//var_dump($_REQUEST);

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$dni = $_POST['dni'];
$legajo = $_POST['legajo'];	

$miAlumno = new Alumno($nombre,$edad,$dni,$legajo);

echo $miAlumno->retornarJson();
//var_dump($miAlumno);

?>