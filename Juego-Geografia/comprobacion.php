<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Geografía</title>
</head>
<body>
    <?php
        session_start();
        $conn = mysqli_connect('localhost', 'root', '', 'geografia') or die ("No se ha podido realizar la conexión con la base de datos");
        $consulta = "select p.nombre nombre from localidades l, provincias p where l.nombre='{$_SESSION["loc_ale"]}' && l.n_provincia = p.n_provincia;";
        $resultado = mysqli_query($conn, $consulta) or die ("No se ha podido realizar la consulta sobre la base de datos");

        if (mysqli_num_rows($resultado) > 0) { 
    ?>
        <?php
            while ($fila = mysqli_fetch_assoc ($resultado)){
                    $provincia = "{$fila["nombre"]}";
            }  

            if ($provincia == $_GET['provincia']) {
                echo "<h1>Enhorabuena. La respuesta es correcta,{$_SESSION["loc_ale"]} está en $provincia</h1>";
                $_SESSION["aciertos"]+=1;
                $_SESSION["intentos"]+=1;
            } 
            else {         
                echo "<h1>Lo siento. La respuesta no es correcta,{$_SESSION["loc_ale"]} está en $provincia</h1>";
                $_SESSION["intentos"]+=1;
            }

            $aciertos=intval($_SESSION["aciertos"]);
            $intentos=intval($_SESSION["intentos"]);
            
            $porcentaje=$aciertos/$intentos*100; 
            echo "Aciertos = $aciertos <br>"; 
            echo "Intentos = $intentos <br>";
            echo "Porcentaje = $porcentaje% <br>";

        } 
    ?>
    <form action="juego.php">     
        <input type="submit" value="Vuelve a intentarlo" />
</form>
</body>
</html>