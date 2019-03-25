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

}


?>