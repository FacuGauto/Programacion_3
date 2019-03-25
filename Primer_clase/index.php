<?php
require_once "alumnos.php";
$array = array();

$array["nombre"] = "facundo";
$array["edad"] = 26;
    //"edad" => 26

//var_dump($array);

$miobj = new stdClass();
$miobj->nombre = "pepe";
//var_dump($miobj);

$miAlumno = new Alumno($array["nombre"],$array["edad"]);
//oivar_dump($miAlumno);


echo $miAlumno->retornarJson($miAlumno);

?>