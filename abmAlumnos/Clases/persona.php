<?php
include "humano.php";

    class Persona extends Humano
    {
      public $dni;
      
      function __construct($nombre,$edad,$dni)
      {
          parent::__construct($nombre,$edad);
          $this->dni = $dni;
      }

      function retorna_datos()
      {
          return parent::retorna_datos() . "," . $this->dni;
      }
    }
?>