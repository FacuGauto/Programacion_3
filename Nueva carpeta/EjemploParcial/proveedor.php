<?php
class Proveedor
{
    public $id;
    public $nombre;
    public $email;
    public $foto;

    function __construct($id,$nombre,$email,$foto)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->foto = $foto;
    }

    function retorna_datos()
    {
        return $this->id . "," . $this->nombre . "," . $this->email . "," . $this->foto;
    }

    function guardar_proveedor($path)
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

    static function leer_proveedores($path)
    {
        $arrayProveedores = array();
        if(file_exists($path)) 
        {
            $file = fopen($path,"r");
            while (!feof($file)) {
                $linea = trim(fgets($file));
                if (preg_match("/,/",$linea)) {
                    $linea = explode(",",$linea);
                    $auxProveedor = new proveedor($linea[0],$linea[1],$linea[2],$linea[3]);
                    $arrayProveedores[] = $auxProveedor;
                }
            }
            fclose($file);
        }
        return $arrayProveedores;
    }

    static function listar_todos_proveedores($path)
    {
        $arrayProveedores = array();
        $arrayProveedores = self::leer_proveedores($path);
        foreach ($arrayProveedores as $proveedor){
           echo $proveedor->retorna_datos() . "\n";
        }
    }

    static function buscarProveedor($path_txt,$nombre)
    {
        $arrayProveedor = array();

        $arrayProveedor = self::leer_proveedores($path_txt);
        $mensaje = "No existe proveedor " . $nombre;

        foreach ($arrayProveedor as $proveedor) {
            if(strcasecmp($proveedor->nombre,$nombre) == 0)
            {
                echo $proveedor->retorna_datos();
                $mensaje = "";
            }
        }
        return $mensaje;
    }

    static function buscarPorId($idProveedor,$path_txt)
    {
        $arrayProveedor = array();
        $arrayProveedor = self::leer_proveedores($path_txt);
        foreach ($arrayProveedor as $proveedor) {
            if($proveedor->id == $idProveedor)
            {
                return $proveedor->id;
            }
        }
        return -1;
    }

    static function NombrePorveedor($idProveedor,$path_txt)
    {
        $arrayProveedor = array();
        $arrayProveedor = self::leer_proveedores($path_txt);
        foreach ($arrayProveedor as $proveedor) {
            if($proveedor->id == $idProveedor)
            {
                return $proveedor->nombre;
            }
        }
        return -1;
    }

    public function ModificarProveedor($id,$path)
    {
        $arrayProveedores = array();
        $arrayProveedores = self::leer_proveedores($path);
        foreach ($arrayProveedores as $proveedor) {
            $proveedor->
        }
    }
}
?>