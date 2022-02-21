<?php
include ("conexion.php");
$conn = mysqli_connect($servidor, $usuario, $clave, $bd) or die ("No ha sido posible establecer la conexion");
echo ("La conexión se ha realizado con éxito. <br>");

if (isset($_GET['nom'])){

    $insertar="insert into clientes (Nombre) values ('{$_GET['nom']}');";
    $resultado=mysqli_query ($conn, $insertar) or die ("No");
} 

?>