<?php
class Pedido
{
    public $producto;
    public $cantidad;
    public $idProveedor;


    function __construct($producto,$cantidad,$idProveedor)
    {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->idProveedor = $idProveedor;
    }

    function retorna_datos()
    {
        return $this->producto . "," . $this->cantidad . "," . $this->idProveedor;
    }

    public function guardarPedido($path,$idProveedor)
    {
        $pathProveedor = "./Archivos./proveedores.txt";
        $respuesta = Proveedor::buscarPorId($idProveedor,$pathProveedor);
        if ($respuesta>=0) {
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
    }

    static function leer_pedidos($path)
    {
        $arrayPedidos = array();
        if(file_exists($path)) 
        {
            $file = fopen($path,"r");
            while (!feof($file)) {
                $linea = trim(fgets($file));
                if (preg_match("/,/",$linea)) {
                    $linea = explode(",",$linea);
                    $auxPedido = new pedido($linea[0],$linea[1],$linea[2]);
                    $arrayPedidos[] = $auxPedido;
                }
            }
            fclose($file);
        }
        return $arrayPedidos;
    }

    public function mostrarPedidos($path)
    {
        $pathProveedor = "./Archivos./proveedores.txt";
        $arrayPedidos = array();
        $arrayPedidos = self::leer_pedidos($path);
        foreach ($arrayPedidos as $pedido){
            $respuesta = Proveedor::NombrePorveedor($pedido->idProveedor,$pathProveedor);
            if($respuesta!=-1)
            {
                echo $pedido->retorna_datos() . "," . $respuesta . "\n";
            }
        }
    }

    static function pedidosPorIdProveedor($path,$id)
    {
        $arrayPedidos = array();
        $arrayPedidos = self::leer_pedidos($path);
        foreach($arrayPedidos as $pedido)
        {
            if($pedido->idProveedor == $id)
            {
                echo $pedido->retorna_datos();
            }
        }
    }
}
?>