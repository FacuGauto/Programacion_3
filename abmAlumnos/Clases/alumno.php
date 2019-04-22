<?php
include "persona.php";
include "./DataBase/AccesoDatos.php";

class Alumno extends Persona
{
    public $legajo;
    function __construct($nombre,$edad,$dni,$legajo)
    {
        parent::__construct($nombre,$edad,$dni);
        $this->legajo = $legajo;
    }

    function retorna_JSON()
    {
        return json_encode($this);
    }

    function retorna_datos()
    {
        return parent::retorna_datos() . "," . $this->legajo;
    }

    function guardar_alumno($path)
    {
        if(file_exists($path)) 
        {
            $file = fopen($path,"a");
            fwrite($file,"\n" . $this->retorna_datos());
        } else {
            $file = fopen($path,"w");
            fwrite($file,$this->retorna_datos());
        }
        fclose($file);
    }

    function guardar_alumno_json($path)
    {
        if(file_exists($path)) 
        {
            $file = fopen($path,"a");
            fwrite($file,"\n" . $this->retorna_JSON());
        } else {
            $file = fopen($path,"w");
            fwrite($file,$this->retorna_JSON());
        }
        fclose($file);
    }

    static function listar_alumno($path)
    {
        $arrayAlumnos = array();
        if(file_exists($path)) 
        {
            $file = fopen($path,"r");
            while (!feof($file)) {
                $linea = trim(fgets($file));
                if (preg_match("/,/",$linea)) {
                    $linea = explode(",",$linea);
                    $auxAlumno = new Alumno($linea[0],$linea[1],$linea[2],$linea[3]);
                    $arrayAlumnos[] = $auxAlumno;
                }
            }
            fclose($file);
        }
        return $arrayAlumnos;
    }

    static function leer_alumnos_json($path)
    {
        $arrayAlumnos = array();
        if(file_exists($path))
        {
            $file = fopen($path,"r");
            while(!feof($file)){
                $auxAlumno = json_decode(fgets($file));
                $alumno = new Alumno($auxAlumno->nombre,$auxAlumno->edad,$auxAlumno->dni,$auxAlumno->legajo);
                $arrayAlumnos[] = $alumno;
            }
            fclose($file);
        }
        return $arrayAlumnos;
    }

    ////Funciones para abm en la base de datos
    function InsertarAlumno()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into Alumno (nombre,edad,legajo,idLocalidad)values(:nombre,:edad,:legajo,idLocalidad)");
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':edad', $this->edad, PDO::PARAM_STR);
        $consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_STR);
        $consulta->execute();		
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    static function TraerTodoLosAlumnos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from Alumno");
            $consulta->execute();	
			return $consulta->fetchAll(PDO::FETCH_OBJ);		
	}
    
}

?>