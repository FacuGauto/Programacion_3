<?php

class tipoServicio
{
	public $id;
	public $tipo;
	public $precio;
	public $demora;

	function __construct($id,$tipo,$precio,$demora)
	{
	    $this->id = $id;
	    $this->tipo = $tipo;
	    $this->precio = $precio;
	    $this->demora = $demora;
	}

	function retorna_datos()
    {
        return $this->id . "," . $this->tipo . "," . $this->precio . "," . $this->demora;
    }

    function guardar_servicio($path)
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

    static function leer_sevicios($path)
    {
        $arrayServicios = array();
        if(file_exists($path)) 
        {
            $file = fopen($path,"r");
            while (!feof($file)) {
                $linea = trim(fgets($file));
                if (preg_match("/,/",$linea)) {
                    $linea = explode(",",$linea);
                    $auxServicio = new tipoServicio($linea[0],$linea[1],$linea[2],$linea[3]);
                    $arrayServicio[] = $auxServicio;
                }
            }
            fclose($file);
        }
        return $arrayServicio;
    }

    static function listar_todos_servicio($arrayServicios)
    {
        $arrayServicioAux = array();
        $arrayServicioAux = $arrayServicios;
        echo '<html>';
        echo '<table width="100%" border="1" style="text-align:center;">';
        echo    '<tr>
                    <th>ID</th><th>Tipo</th><th>Precio</th><th>Demora</th>
                </tr>';
        foreach ($arrayServicioAux as $servicio){
            $auxServicio = explode(",",$servicio->retorna_datos());
            echo '
            <tr>
                <td>'.$auxServicio[0].'</td>
                <td>'.$auxServicio[1].'</td>
                <td>'.$auxServicio[2].'</td>
                <td>'.$auxServicio[3].'</td>
            </tr>';
        }
        echo '</table>';	
        echo '</html>';
    }

    

}
?>
