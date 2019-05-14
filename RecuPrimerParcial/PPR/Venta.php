<?php
class Venta
{
	public $email;
	public $sabor;
	public $tipo;
	public $cantidad;

	function __construct($email,$sabor,$tipo,$cantidad)
	{
		$this->email = $email;
	    $this->sabor = $sabor;
	    $this->tipo = $tipo;
	    $this->cantidad = $cantidad;
	}

	function retorna_datos()
    {
        return $this->email . "," . $this->sabor . "," . $this->tipo . "," . $this->cantidad;
    }

}
?>