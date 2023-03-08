<?php
session_start();
$nombreCompleto = $_POST['Nombre'];
$fecha_mysql = $_POST['Fech_nac'];
$Edad = $_POST['Year'];
$Bachillerato = $_POST['Bachillerato'];
$Promedio = $_POST['Promedio'];
$Municipio = $_POST['Municipio'];
$Certificado = $_POST['customRadio'];
$Nombre_imagen = $_FILES['Foto']['name'];
$tipo = $_FILES['Foto']['type'];
$temp = $_FILES['Foto']['tmp_name'];
$msg = null;
$Direcctorio = "Recursos/";

include('conexion.php');
$con = conectaDB();
 
 ///
 if (isset($Nombre_imagen) && $Nombre_imagen) {

    if (!((strpos($tipo, 'gif') || strpos($tipo, 'png') || strpos($tipo, 'jpeg')))) {
        $msg = "Solo se permiten archivos con extension: gif,png,jpeg";
    } else {
        if(file_exists($Direcctorio) || @mkdir($Direcctorio)){
            $Destino = $Direcctorio.$Nombre_imagen;
            if(@move_uploaded_file($temp,$Destino)){
                $sql = "INSERT INTO aspirante (nombre, fecha, edad, bachillerato, promedio, municipio, certificado, foto) VALUES 
                ('".$nombreCompleto."','".$fecha_mysql."',".$Edad.", '".$Bachillerato."'
                ,".$Promedio.",'".$Municipio."', '".$Certificado."','".$Nombre_imagen."')";
                $resultado = mysqli_query($con, $sql);
                $msg="Se registro con exito";
            }else{
                $msg="No se pudo mover correctamente";
            }
        }else{
            $msg= "Ocurrio un error en el servidor";
        }
    }
    $_SESSION['Mensaje']= $msg;
    header("location: ../../forms/general.php");
}
 ///
?>