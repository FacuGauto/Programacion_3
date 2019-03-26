<?php
require_once "alumnos.php";


//$jsondata = file_get_contents('alumno.json'); 

//$alumno = json_decode($jsondata,true);

//var_dump($alumno);
//echo $alumno;

//echo "ALUMNOS....";


$file = fopen("alumno.txt","r");

while(! feof($file))
  {
  echo fgets($file);
  }

fclose($file);

?>