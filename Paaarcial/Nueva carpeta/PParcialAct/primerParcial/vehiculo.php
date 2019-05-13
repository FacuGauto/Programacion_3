<?php

class Vehiculo
{
	public $marca;
	public $modelo;
	public $patente;
	public $precio;
    public $foto;

	function __construct($marca,$modelo,$patente,$precio,$foto="sin foto")
	{
	    $this->marca = $marca;
	    $this->modelo = $modelo;
	    $this->patente = $patente;
	    $this->precio = $precio;
        $this->foto = $foto;
	}

	function retorna_datos()
    {
        return $this->marca . "," . $this->modelo . "," . $this->patente . "," . $this->precio . "," . $this->foto;
    }

    function guardar_vehiculo($path)
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

    static function leer_vehiculos($path)
    {
        $arrayVehiculos = array();
        if(file_exists($path)) 
        {
            $file = fopen($path,"r");
            while (!feof($file)) {
                $linea = trim(fgets($file));
                if (preg_match("/,/",$linea)) {
                    $linea = explode(",",$linea);
                    $auxVehiculo = new Vehiculo($linea[0],$linea[1],$linea[2],$linea[3]);
                    $arrayVehiculos[] = $auxVehiculo;
                }
            }
            fclose($file);
        }
        return $arrayVehiculos;
    }

    function buscarPorPatente($patente,$path_txt)
    {
        $arrayVehiculos = array();
        $resultado = -1;
        $arrayVehiculos = self::leer_vehiculos($path_txt);
        foreach ($arrayVehiculos as $vehiculo) {
            if($vehiculo->patente == $patente)
            {
                $resultado = $vehiculo->patente;
            }
        }   
        return $resultado;
    }

    static function buscarVehiculoPorParametro($path_txt,$parametro)
    {
        $arrayVehiculos = array();
        $arrayVehiculosAux = array();
        $arrayVehiculos = self::leer_vehiculos($path_txt);
        foreach ($arrayVehiculos as $vehiculo) {
            if((strcasecmp($vehiculo->marca,$parametro) == 0) || (strcasecmp($vehiculo->modelo,$parametro) == 0) || (strcasecmp($vehiculo->patente,$parametro) == 0))
            {
            	$arrayVehiculosAux[] = $vehiculo;
            }
        }
        return $arrayVehiculosAux;
    }

    function listar_todos_vehiculos($arrayVehiculos)
    {   
        if (count($arrayVehiculos)>0) {
        	foreach ($arrayVehiculos as $vehiculo){
           	echo $vehiculo->retorna_datos() . "\n";
        	}
        }
    }

    static function datosPorPatente($patente,$path_txt)
    {
    	$arrayVehiculos = self::leer_vehiculos($path_txt);
    	$resultado = "";
        foreach ($arrayVehiculos as $vehiculo) 
        {
        	if($vehiculo->patente == $patente)
        	{
        		$resultado = $vehiculo->patente . "," . $vehiculo->marca . "," . $vehiculo->modelo . "," . $vehiculo->precio;
        	}
        }     
        return $resultado;
    }

    static function guardar_turno($path_turno,$patente,$path_vehiculo,$fecha,$tipoServicio)
    {
        if(file_exists($path_turno)) 
        {
            $file = fopen($path_turno,"a");
            if(!empty(self::datosPorPatente($patente,$path_vehiculo)))
            {
            	fwrite($file,"\n" . $fecha . "," . self::datosPorPatente($patente,$path_vehiculo) . "," . $tipoServicio);
            }
        }
        else{
            $file = fopen($path_turno,"w");
            if(!empty(self::datosPorPatente($patente,$path_vehiculo)))
            {
            	fwrite($file,"\n" . $fecha . "," . self::datosPorPatente($patente,$path_vehiculo) . "," . $tipoServicio);
            }
        }
        fclose($file);
    }

    function cambiar_nombre_img($nombre)
    {
        $array = explode('.',$nombre);
        $array[0] = $this->patente;
        $nombre_imagen = $array[0] . "." . $array[1];
        $nombre_imagen = self::agregar_fecha($nombre_imagen);
        return $nombre_imagen;
    }

    static function agregar_fecha($nombre)
    {
        $array = explode('.',$nombre);
        $array[0] = $array[0] . date("-Ymd") . date("-hisa");
        $nombre_imagen = $array[0] . "." . $array[1];
        return $nombre_imagen;
    }
}

?>