<?php
require_once "persona.php";
class Alumno extends persona
{
	public $legajo;

	function __construct($nombre,$edad,$dni,$legajo) 
	{
       parent::__construct($nombre,$edad,$dni);
       $this->legajo = $legajo;
   	}

   	public function guardarArchivo($pathfile)
   	{
   		if(file_exists($pathfile))
   		{
   			$archivo = fopen($pathfile, "a");
   			fwrite($archivo, $this->nombre.",".$this->edad.",".$this->dni.",".$this->legajo."\r\n");
   			fclose($archivo);
   		}
   		else
   		{
   			$archivo = fopen($pathfile, "w");
   			fwrite($archivo, $archivo, $this->nombre.",".$this->edad.",".$this->dni.",".$this->legajo."\r\n");
   			fclose($archivo);
   		}
   	}

   	public function guardarJson($pathfile)
   	{
   		if(file_exists($pathfile))
   		{
   			$archivo = fopen($pathfile, "a");
   			fwrite($archivo, $this->retornarJson());
   			fclose($archivo);
   		}
   		else
   		{
   			$archivo = fopen($pathfile, "w");
   			fwrite($archivo, $this->retornarJson());
   			fclose($archivo);
   		}
   	}
/*
   	public function leerJson($pathfile)
   	{
   		 $jsondata = file_get_contents('alumno.json'); 

   		 $alumno = json_decode($jsondata,true);

   	}*/

   	public function leerAlumno($path)
   	{
   		
   	}

}


?>