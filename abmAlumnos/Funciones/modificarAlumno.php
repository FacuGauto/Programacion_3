<?php
include "./Clases/alumno.php";
$path = "./Archivos/lista_Alumnos.txt";
$path_json = "./Archivos/lista_Alumnos.json";

if (!empty($_GET['Nombre'])) 
{
    if (!empty($_GET['Edad'])) 
    {
        if (!empty($_GET['Dni'])) 
        {
            if (!empty($_GET['Legajo'])) 
            {
                $nombre = $_GET['Nombre'];
                $edad = $_GET['Edad'];
                $dni = $_GET['Dni'];
                $legajo = $_GET['Legajo'];

                $mensaje = "Legajo no encontrado";
                $arrayAlumno = array();
                $auxArrayAlumnos = array();
                //$arrayAlumno = Alumno::listar_alumno($path);
                $arrayAlumno = Alumno::leer_alumnos_json($path_json);
                foreach ($arrayAlumno as $alumno) {
                    if ($alumno->legajo == $legajo) {
                        $alumno->nombre = $nombre;
                        $alumno->edad= $edad;
                        $alumno->dni = $dni;
                        $alumno->legajo = $legajo;
                        $mensaje = "Alumno modificado";
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
            else 
            {
                echo "Falta el campo Legajo";
            }
        }
        else 
        {
            echo "Falta el campo Dni";
        }
    } 
    else 
    {
        echo "Falta el campo Edad";
    }    
} 
else 
{
    echo "Falta el campo Nombre";
}

?>