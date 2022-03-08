<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Geografía</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
   session_start();
        
   $conn = mysqli_connect('localhost', 'root', '', 'geografia') or die ("No se ha podido realizar la conexión con la base de datos");
   $consulta = "select nombre from provincias order by nombre;"; 
   $resultado = mysqli_query($conn, $consulta) or die ("No se ha podido realizar la consulta sobre la base de datos");
   $consulta2 = "select nombre from localidades order by rand () limit 1;"; 
   $resultado2 = mysqli_query($conn, $consulta2) or die ("No se ha podido realizar la consulta sobre la base de datos");

   if (mysqli_num_rows($resultado) > 0) { 
?>
       <h2>Intenta adivinar la provicia de la siguiente localidad</h2>
       <form action=comprobacion.php> 
           <label>Localidad:</label><?php
                   while ($localidad = mysqli_fetch_assoc ($resultado2)){
                       $localidad_ale = $localidad["nombre"]; 
                       echo "<b>{$localidad["nombre"]}</b>";  
                   }
                   $_SESSION["loc_ale"]=$localidad_ale;                    
           ?>
           <br> <br>
           <select name=provincia>
               <?php
                   while ($provincia = mysqli_fetch_assoc ($resultado)){
                       echo "<option value='{$provincia["nombre"]}'>{$provincia["nombre"]}</option>"; 
                   }                    
               ?>
           </select>
           <br> <br>
           <button>Comprobar</button>
           <br> <br>
       </form>
<?php

       $aciertos=0;
       if(isset($_SESSION["aciertos"])){
           $aciertos=$_SESSION["aciertos"];
       }

       $intentos=0;
       if(isset($_SESSION["intentos"])){
           $intentos=$_SESSION["intentos"];
       }

       $porcentaje=$aciertos/$intentos*100; 
       echo "Aciertos = $aciertos <br>"; 
       echo "Intentos = $intentos <br>";
       echo "Porcentaje = $porcentaje% <br>";
   } 
 
?>
</body>
</html>