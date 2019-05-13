<?php
//include "./vehiculo.php";
$path_vehiculo = "./Archivos/vehiculos.txt";
if(!empty($_POST['patente']))
{
	if(!empty($_POST['marca']))
	{
		if(!empty($_POST['modelo']))
		{
			if(!empty($_POST['precio']))
			{
				if(!empty($_FILES['foto']))
				{

				}
					$patente = $_POST['patente'];
					$marca = $_POST['marca'];
					$modelo = $_POST['modelo'];
					$precio = $_POST['precio'];
					$foto = $_FILES['foto']['name'];
					$path_imagen = $_FILES['foto']['tmp_name'];
					$auxVehiculo = new Vehiculo($marca,$modelo,$patente,$precio);
					$mensaje = "Patente no encontrada";
					if($auxVehiculo->buscarPorPatente($patente,$path_vehiculo)!=-1)
	            	{
	            		$arrayVehiculos = array();
	            		$arrayVehiculos = Vehiculo::leer_vehiculos($path_vehiculo);
	            		$auxArrayVehiculo = array();

	            		foreach ($arrayVehiculos as $vehiculo) {
	            			if($vehiculo->patente == $patente)
	            			{
	            				$vehiculo->patente = $patente;
	            				$vehiculo->marca = $marca;
	            				$vehiculo->modelo = $modelo;
	            				$vehiculo->precio = $precio;
	            				$vehiculo->foto = $vehiculo->cambiar_nombre_img($foto);
	            				if(is_null("./fotos/$vehiculo->foto"))
                                {
                                	move_uploaded_file($path_imagen,"./fotos/$vehiculo->foto");		
                                }
                                else
                                {
                                	move_uploaded_file($path_imagen,"./fotos/$vehiculo->foto");	
                                }
	            				
	            				$mensaje = "Vehiculo modificado";
	            			}
	            			$auxArrayVehiculo[] = $vehiculo;
	            		}
	            		echo $mensaje;
	            		unlink($path_vehiculo);
	            		foreach ($auxArrayVehiculo as $vehiculo) {
	            			$vehiculo->guardar_vehiculo($path_vehiculo);
	            		}
	            	}
			}
		}
	}
}

?>