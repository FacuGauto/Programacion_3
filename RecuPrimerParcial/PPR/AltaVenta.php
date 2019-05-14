<?php
include "./pizza.php";
$path_txt_pizza = "./Archivos/Pizza.txt";
if(!empty($_POST['email']))
{
	if(!empty($_POST['sabor']))
	{
		if(!empty($_POST['tipo']))
		{
			if(!empty($_POST['cantidad']))
			{
				Pizza::buscarRepetido($_POST['sabor'],$_POST['tipo'],$_POST['cantidad'],$path_txt_pizza);
			}
		}
	}
}
?>