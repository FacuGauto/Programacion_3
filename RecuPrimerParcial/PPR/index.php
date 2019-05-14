<?php
$dato = $_SERVER['REQUEST_METHOD'];

if($dato=="POST") 
{
	if (!empty($_POST['caso']))
    {
    	if($_POST['caso'] == 'PizzaCarga')
    	{
    		include "./PizzaCarga.php";
    	}
    	elseif($_POST['caso'] == 'AltaVenta')
    	{
    		include "./AltaVenta.php";
    	}
    }
}
elseif($dato=="GET")
{
	include "./PizzaConsultar.php";	
}
?>