<?php
$foto=$_FILES['foto'];
$dir_img = './Fotos';
var_dump($foto);
$name = $_FILES["foto"]["name"];
$tmp = $_FILES["foto"]["tmp_name"];


$path = "$dir_img/$name";
$backup = './FotosBackup/descarga.png';

if(file_exists($path))
{
    rename ("$path","$backup");
}
else
{
    $a = move_uploaded_file($tmp, "$dir_img/$name");
}

$estampa = imagecreatefrompng('estampa.png');
$imagen = imagecreatefromjpeg('foto.jpeg');

var_dump($estampa);
//basename($_SERVER['PHP_SELF']); 
?>