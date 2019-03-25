<?php
require_once "humano.php";
class Persona extends humano
{
	public $dni;

	function __construct($nombre,$edad,$dni) {
       parent::__construct($nombre,$edad);
       $this->dni = $dni;
   }
}
?>