<?php
    class Humano
    {
        public $nombre;
        public $edad;

        function __construct($nombre,$edad)
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
        }

        function retorna_datos()
        {
            return $this->nombre . "," . $this->edad;
        }
    }
?>