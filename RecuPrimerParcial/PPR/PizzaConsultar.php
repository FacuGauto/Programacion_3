<?php
include "./pizza.php";
$path_txt_pizza = "./Archivos/Pizza.txt";
if(!empty($_GET['sabor']))
{
	if(!empty($_GET['Tipo']))
	{
		$sabor = $_GET['sabor'];
		$Tipo = $_GET['Tipo'];

		$arrayPizzas = array();
    	$arrayPizzas = Pizza::buscarPizzaPorParametro($path_txt_pizza,$sabor,$Tipo);
    	if(count($arrayPizzas) > 0)
    	{
    		echo "SI HAY";
    	}
    	else
    	{
    		$respuesta = Pizza::buscarPizzaPorParametro2($path_txt_pizza,$sabor,$Tipo);
    		echo "$respuesta";
    	}
	}
}
	
?>