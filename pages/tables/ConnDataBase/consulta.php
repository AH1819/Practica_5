<?php
include('conexion.php');
$conn = conectaDB();
$sql = "SELECT * FROM aspirantes";
$resultado = mysqli_query($conn,$sql); 

if ($resultado->num_rows > 0) {
    echo "<table class = 'tabla'> <tbody>";
    echo "<thead>";
    echo "<th><font color = 'white'>Nombre</font></th>";
    echo "<th><font color = 'white'>Precio</font></th>";
    echo "<th><font color = 'white'>Eliminar</font></th>";
    echo "</thead>";

    while($fila = mysqli_fetch_row($resultado)){
			echo "<tr>";
			echo "<td><font color = 'black'>".$fila[1]."</font></td>";
			echo "<td><font color = 'black'>".$fila[2]."</font></td>";
            echo "<td class = 'eliminar'><a href = 'crud/eliminar.php?idp=".$fila[0]."' ><img src ='source/iconoeliminar.png'></a></td>";
			echo "</tr>";
		}
		echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>