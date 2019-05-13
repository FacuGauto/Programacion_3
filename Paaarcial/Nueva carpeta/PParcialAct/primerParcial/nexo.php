<?php
include "./vehiculo.php";
include "./tipoServicio.php";
include "./turno.php";
$path_txt = "./Archivos/vehiculos.txt";
$path_txt_servicio = "./Archivos/tiposServicio.txt";
$path_turno = "./Archivos/turnos.txt";
$dato = $_SERVER['REQUEST_METHOD'];

if($dato=="POST")
{
    if (!empty($_POST['caso']))
    {
    	if($_POST['caso'] == 'cargarVehiculo')
    	{
    		$marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $patente = $_POST['patente'];
            $precio = $_POST['precio'];
            $vehiculo = new Vehiculo($marca,$modelo,$patente,$precio);
            if($vehiculo->buscarPorPatente($patente,$path_txt)==-1)
            {
            	$vehiculo->guardar_vehiculo($path_txt);
            	echo "Vehiculo agregado con exito";
            }
            
    	}
    	if($_POST['caso'] == 'cargarTipoServicio')
    	{
    		$id = $_POST['id'];
            $tipo = $_POST['tipo'];
            $precio = $_POST['precio'];
            $demora = $_POST['demora'];
            if ($tipo == 10000 || $tipo == 20000 || $tipo == 50000) {
            	$servicio = new tipoServicio($id,$tipo,$precio,$demora);
            	$servicio->guardar_servicio($path_txt_servicio);
                echo "Servicio guardado con exito";
            }
            
    	}
        if($_POST['caso'] == 'modificarVehiculo')
        {
            include "./modificarVehiculo.php";
        }
    }
}
elseif($dato=="GET")
{
	if (!empty($_GET['caso']))
    {
    	if($_GET['caso'] == 'consultarVehiculo')
    	{
    		if (!empty($_GET['parametro']))
    		{
    			$parametro = $_GET['parametro'];
    			$arrayVehiculos = array();
    			$arrayVehiculos = Vehiculo::buscarVehiculoPorParametro($path_txt,$parametro);
    			if(count($arrayVehiculos) > 0)
    			{
    				Vehiculo::listar_todos_vehiculos($arrayVehiculos);	
    			}
    			else
    			{
    				echo "No existe " . $parametro;
    			}
    			
    		}
    	}
    	elseif($_GET['caso'] == 'sacarTurno')
    	{
    		$patente = $_GET['patente'];
    		$dia = $_GET['dia'];
    		$tipoServicio = $_GET['tipoServicio'];

    		Vehiculo::guardar_turno($path_turno,$patente,$path_txt,$dia,$tipoServicio);
    	}
    	elseif($_GET['caso'] == 'turnos')
    	{
    		$arrayServicios = array();
    		$arrayServicios = tipoServicio::leer_sevicios($path_txt_servicio);
    		tipoServicio::listar_todos_servicio($arrayServicios);
    	}
        elseif($_GET['caso'] == 'inscripciones')
        {
            $arrayTurnos = array();
            $arrayTurnosAux = array();
            $parametro = $_GET['parametro'];
            $arrayTurnos = Turno::leer_turnos($path_turno);
            if(count($arrayTurnos) > 0)
            {
                $arrayTurnosAux = Turno::buscarTurnoPorParametro($arrayTurnos,$parametro);
                Turno::listar_turnos($arrayTurnosAux);
            }
        }
    }
}
?>