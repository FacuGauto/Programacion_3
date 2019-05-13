<?php
class Turno
{
	public $fecha;
	public $patente;
	public $marca;
	public $modelo;
	public $precio;
	public $tipoServicio;

	function __construct($fecha,$patente,$marca,$modelo,$precio,$tipoServicio)
	{
	    $this->fecha = $fecha;
	    $this->patente = $patente;
	    $this->marca = $marca;
	    $this->modelo = $modelo;
	    $this->precio = $precio;
	    $this->tipoServicio = $tipoServicio;
	}

	function retorna_datos()
    {
        return $this->fecha . "," . $this->patente . "," . $this->marca . "," . $this->modelo . "," . $this->precio . "," . $this->tipoServicio;
    }

	static function leer_turnos($path)
    {
        $arrayTurnos = array();
        if(file_exists($path)) 
        {
            $file = fopen($path,"r");
            while (!feof($file)) {
                $linea = trim(fgets($file));
                if (preg_match("/,/",$linea)) {
                    $linea = explode(",",$linea);
                    $auxTurno = new Turno($linea[0],$linea[1],$linea[2],$linea[3],$linea[4],$linea[5]);
                    $arrayTurnos[] = $auxTurno;
                }
            }
            fclose($file);
        }
        return $arrayTurnos;
    }

    static function buscarTurnoPorParametro($array,$parametro)
    {
    	$arrayTurnosAux = array();
        foreach ($array as $turno) {
            if((strcasecmp($turno->tipoServicio,$parametro) == 0) || (strcasecmp($turno->fecha,$parametro) == 0))
            {
            	$arrayTurnosAux[] = $turno;
            }
        }
        return $arrayTurnosAux;
    }

    static function listar_turnos($array)
    {
        echo '<html>';
        echo '<table width="100%" border="1" style="text-align:center;">';
        echo    '<tr>
                    <th>Fecha</th><th>Patente</th><th>Marca</th><th>Modelo</th><th>Precio</th><th>Tipo Servicio</th>
                </tr>';
        foreach ($array as $turno){
            $auxTurno = explode(",",$turno->retorna_datos());
            echo '
            <tr>
                <td>'.$auxTurno[0].'</td>
                <td>'.$auxTurno[1].'</td>
                <td>'.$auxTurno[2].'</td>
                <td>'.$auxTurno[3].'</td>
                <td>'.$auxTurno[4].'</td>
                <td>'.$auxTurno[5].'</td>
            </tr>';
        }
        echo '</table>';	
        echo '</html>';
    }

}
?>