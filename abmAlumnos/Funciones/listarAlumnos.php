<?php
include "./Clases/alumno.php";

$path = "./Archivos/lista_Alumnos.txt";
$path_json = "./Archivos/lista_Alumnos.json";

$arrayAlumno = array();
$arrayAlumno = Alumno::TraerTodoLosAlumnos();
foreach ($arrayAlumno as $alumno){
    echo $alumno->nombre . " " . $alumno->edad . "\n";
}
//$sql = "SELECT * FROM `Proveedores` WHERE NOMBRE = ?";

/*try {
    $base = new PDO('mysql:host=localhost; dbname=UTN', 'root', '');
    echo "Conexion exitosa\n";
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
    $resultado = $base->prepare($sql);
    $resultado->execute(array("Perez"));
    while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
        echo "Numero " . $registro['Numero'] . " nombre " . $registro['Nombre'] . " domicilio " . $registro['Domicilio'] . " localidad " . $registro['Localidad'];
    }
} catch (Exception $e) {
    die($e->GetMessage());
}

$base = null;
*/







//$arrayAlumno = array();

//$arrayAlumno = Alumno::listar_alumno($path);
//$arrayAlumno = Alumno::leer_alumnos_json($path_json);

//foreach ($arrayAlumno as $alumno) {
//    echo $alumno->retorna_datos() . "\n";
//}

?>