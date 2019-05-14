<?php
class Pizza
{
	public $sabor;
	public $precio;
	public $tipo;
	public $cantidad;
	public $foto;

	function __construct($sabor,$precio,$tipo,$cantidad,$foto="sin foto")
	{
		$this->sabor = $sabor;
	    $this->precio = $precio;
	    $this->tipo = $tipo;
	    $this->cantidad = $cantidad;
	    $this->foto = "./Img/$foto";
	}

	function retorna_datos()
    {
        return $this->sabor . "," . $this->precio . "," . $this->tipo . "," . $this->cantidad . "," . $this->foto;
    }

    function guardar_pizza($path)
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

    static function leer_pizzas($path)
    {
        $arrayPizzas = array();
        if(file_exists($path)) 
        {
            $file = fopen($path,"r");
            while (!feof($file)) {
                $linea = trim(fgets($file));
                if (preg_match("/,/",$linea)) {
                    $linea = explode(",",$linea);
                    $auxPizza = new Pizza($linea[0],$linea[1],$linea[2],$linea[3],$linea[4]);
                    $arrayPizzas[] = $auxPizza;
                }
            }
            fclose($file);
        }
        return $arrayPizzas;
    }

    static function buscarPizzaPorParametro($path_txt,$sabor,$tipo)
    {
        $arrayPizza = array();
        $arrayPizzaAux = array();
        $arrayPizza = self::leer_pizzas($path_txt);
        foreach ($arrayPizza as $pizza) {
            if((strcasecmp($pizza->sabor,$sabor) == 0) && (strcasecmp($pizza->tipo,$tipo) == 0))
            {
            	$arrayPizzaAux[] = $pizza;
            }
        }
        return $arrayPizzaAux;
    }

    static function buscarPizzaPorParametro2($path_txt,$sabor,$tipo)
    {
        $arrayPizza = array();
        $arrayPizzaAux = array();
        $respuesta = "";
        $arrayPizza = self::leer_pizzas($path_txt);
        foreach ($arrayPizza as $pizza) {
            if((strcasecmp($pizza->sabor,$sabor) == 0))
            {
            	if((strcasecmp($pizza->tipo,$tipo) != 0))
            	{
            		$respuesta = "El Tipo no existe.";	
            	}
            }
            if((strcasecmp($pizza->tipo,$tipo) == 0))
            {
            	if((strcasecmp($pizza->sabor,$sabor) != 0))
            	{
            		$respuesta = "El Sabor no existe.";	
            	}
            }
            if((strcasecmp($pizza->tipo,$tipo) != 0))
            {
            	if((strcasecmp($pizza->sabor,$sabor) != 0))
            	{
            		$respuesta = "El Sabor y el tipo no existen.";	
            	}
            }

        }
        return $respuesta;
    }

    static function buscarRepetido($sabor,$tipo,$cantidad,$path_txt)
    {
        $arrayPizzas = array();
        $resultado = -1;
        $arrayPizzas = self::leer_pizzas($path_txt);
        foreach ($arrayPizzas as $pizza) {
            if($pizza->sabor == $sabor && $pizza->tipo == $tipo)
            {
            	if($cantidad <= $pizza->cantidad)
            	{
            		echo "HAy";
            	}
            }
        }   
        return $resultado;
    }
}
?>