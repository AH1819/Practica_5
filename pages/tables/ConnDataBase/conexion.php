<?php
function conectaDB() 
{ 
  	$host = 'practicas.chy2xaqhcy1x.us-east-1.rds.amazonaws.com'; //'148.222.7.8'
	$user = 'AH1819';
	$pass = 'AH18192001';

   if (!( $link = @mysqli_connect($host,$user,$pass)) )
   {
      echo "Error al realizar la conexión a la base de datos.";
      exit();
   }

   if (!mysqli_select_db($link,"aspirantes"))
   { 
      echo "Error al seleccionar la base de datos."; 
      exit(); 
   }    
   return $link; 
} 
?>