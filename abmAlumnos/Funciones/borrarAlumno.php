<?php
include "./Clases/alumno.php";
$path = "./Archivos/lista_Alumnos.txt";
$path_json = "./Archivos/lista_Alumnos.json";

if(!empty($_GET['Legajo']))
{
    $mensaje = "Legajo no encontrado";
    $arrayAlumno = array();
    $auxArrayAlumnos = array();
    //$arrayAlumnos = Alumno::listar_alumno($path);
    $arrayAlumnos = Alumno::leer_alumnos_json($path_json);
    foreach ($arrayAlumnos as $alumno) {
        if ($alumno->legajo == $_GET['Legajo']) {
            $mensaje = "Legajo encontrado";
            continue;
        }
        $auxArrayAlumnos[] = $alumno;
    }
    echo $mensaje;
    //unlink($path);
    unlink($path_json);
    foreach ($auxArrayAlumnos as $alumno) {
         //$alumno->guardar_alumno($path);
         $alumno->guardar_alumno_json($path_json);
    }
}
else {
    echo "No hay campo Legajo del alumno a borrar.";
}
?>