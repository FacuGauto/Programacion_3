<?php
include "./pizza.php";
$path_txt_pizza = "./Archivos/Pizza.txt";

if(!empty($_POST['sabor']))
{
	if((strcasecmp($_POST['sabor'],"muzza") == 0) || (strcasecmp($_POST['sabor'],"jamon") == 0) || (strcasecmp($_POST['sabor'],"especial") == 0))
	{
		if(!empty($_POST['precio']))
		{
			if(!empty($_POST['tipo']))
			{
				if((strcasecmp($_POST['tipo'],"molde") == 0) || (strcasecmp($_POST['tipo'],"piedra") == 0)) 
				{
					if(!empty($_POST['cantidad']))
					{
						if(!empty($_POST['tipo']))
						{													
							$sabor = $_POST['sabor'];
							$precio = $_POST['precio'];
							$cantidad = $_POST['cantidad'];
							$tipo = $_POST['tipo'];
							$foto = $_FILES['foto']['name'];
							$path_imagen = $_FILES['foto']['tmp_name'];
						

							$pizza = new Pizza($sabor,$precio,$tipo,$cantidad,$foto);
							$pizza->guardar_pizza($path_txt_pizza);

							move_uploaded_file($path_imagen,"./Img/$foto");
	            			echo "Pizza agregada con exito";	
						}
					}	
				}
				else
				{
					echo "El Tipo solo puede ser piedra o molde";
				}	
			}
		}
	}
	else
	{
		echo "El sabor solo puede ser muzza, jamon o especial";
	}
}
?>