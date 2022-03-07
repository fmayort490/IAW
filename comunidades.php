<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elección de comunidad autónoma</title>
</head>
<body>
    <?php
        include 'configBBDD.php'; // incluimos los datos de la conexión
        $conn=mysqli_connect($servidor,$usuario,$clave,$bbdd) or die ("No ha sido posbile establecer la conexión");

        $consulta= "select nombre from comunidades order by nombre;"; //solo texto

        $resultado=mysqli_query ($conn, $consulta); // aquí se ejecuta realmente la consulta

        $num_filas=mysqli_num_rows ($resultado);

        if($num_filas>0){
    ?>
    <form action="provincias.php">
        <label for="comunidades">Elija la comunidad deseada</label>
        <select name="comunidades">
            <?php
                while($fila=mysqli_fetch_assoc($resultado))
                    echo "<option value='{$fila["nombre"]}'>{$fila ["nombre"]}</option>";

            ?>
           </select>
            <button>Buscar provincias</button> 

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