<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elección de provincia</title>
</head>
<body>
    <?php
        include 'configBBDD.php'; // incluimos los datos de la conexión

        $comunidad= $_GET['comunidades'];
        
        $conn=mysqli_connect($servidor,$usuario,$clave,$bbdd) or die ("No ha sido posbile establecer la conexión");

        $consulta= "select provincias.nombre from comunidades, provincias where provincias.id_comunidad=comunidades.id_comunidad and comunidades.nombre='{$comunidad}';"; //solo texto
        // Hago un select de las 2 tablas, para sacar el nombre de comunidad igualo sus id y el nombre con la variable $comunidad
        $resultado=mysqli_query ($conn, $consulta); // aquí se ejecuta realmente la consulta

        $num_filas=mysqli_num_rows ($resultado);

        if($num_filas>0){
    ?>
    <form action="localidades.php">
        <label for="provincias">Elija la provincia deseada</label>
        <select name="provincias">
            <?php
                while($fila=mysqli_fetch_assoc($resultado))
                    echo "<option value='{$fila["nombre"]}'>{$fila ["nombre"]}</option>";

            ?>
           </select>
            <button>Buscar localidades</button> 

            </form>
            <?php
                }   
                else{
                    echo "No hay datos en la tabla";
                }
            ?>
             
        </select>

    </form>
</body>
</html>