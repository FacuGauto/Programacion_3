<?php
echo "AAAAAAAAAA";
$dato = $_SERVER['REQUEST_METHOD'];

if ($dato=="GET") 
{
    include "./Funciones/listarAlumnos.php";
} 
else if ($dato == "POST")
{
    include "./Funciones/crearAlumno.php";
}
elseif ($dato == "DELETE") 
{
    include "./Funciones/borrarAlumno.php";
}
elseif ($dato == "PUT") 
{
    include "./Funciones/modificarAlumno.php";
}

//$alum = new Alumno($nombre,$edad,$dni,$legajo);

//echo $alum->retorna_JSON();

?>