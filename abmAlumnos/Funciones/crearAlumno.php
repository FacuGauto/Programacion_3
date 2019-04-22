<?php
include "./Clases/alumno.php";
$path_txt = "./Archivos/lista_Alumnos.txt";
$path_json = "./Archivos/lista_Alumnos.json";


if (!empty($_POST['Nombre'])) 
{
    if (!empty($_POST['Edad'])) 
    {
        if (!empty($_POST['Dni'])) 
        {
            if (!empty($_POST['Legajo'])) 
            {
                $nombre = $_POST['Nombre'];
                $edad = $_POST['Edad'];
                $dni = $_POST['Dni'];
                $legajo = $_POST['Legajo'];

                $alum = new Alumno($nombre,$edad,$dni,$legajo);
                $alum->InsertarAlumno();//database
                //$alum->guardar_alumno($path_txt);
                $alum->guardar_alumno_json($path_json);
                echo "Alumno agregado con exito";
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