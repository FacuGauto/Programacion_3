<?php
include "./proveedor.php";
include "./pedido.php";
$path_txt = "./Archivos/proveedores.txt";
$path_pedido = "./Archivos/pedidos.txt";
$dato = $_SERVER['REQUEST_METHOD'];
if($dato=="POST")
{
    if (!empty($_POST['caso']))
    {
        $caso = $_POST['caso'];
        if ($caso == "cargarProveedor") {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $foto = $_POST['foto'];
            $proveedor = new Proveedor($id,$nombre,$email,$foto);
            $proveedor->guardar_proveedor($path_txt);
            echo "Proveedor agregado con exito";
        }
        elseif($caso == "hacerPedido")
        {
            $producto = $_POST['producto'];
            $cantidad = $_POST['cantidad'];
            $idProveedor = $_POST['idProveedor'];
            $pedido = new Pedido($producto,$cantidad,$idProveedor);
            $pedido->guardarPedido($path_pedido,$pedido->idProveedor);

        }
    }

}
elseif($dato=="GET")
{
    if (!empty($_GET['caso']))
    {
        $caso = $_GET['caso'];
        if ($caso == "consultarProveedor")
        {
            $nombre = $_GET['nombre'];

            $mensaje = Proveedor::buscarProveedor($path_txt,$nombre);
            echo $mensaje;
        }
        elseif($caso == "proveedores")
        {
            Proveedor::listar_todos_proveedores($path_txt);
        }
        elseif ($caso == "listarPedidos") {
            Pedido::mostrarPedidos($path_pedido);
        }
        elseif($caso == "listarPedidoProveedor") {
            $id_proveedor = $_GET['idProveedor'];
            Pedido::pedidosPorIdProveedor($path_pedido,$id_proveedor);
        }
    }
    
}
?>