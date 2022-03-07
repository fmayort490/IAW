<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elección de localidad</title>
</head>
<body>
    <?php
        include 'configBBDD.php'; // incluimos los datos de la conexión

        $conn=mysqli_connect($servidor,$usuario,$clave,$bbdd) or die ("No ha sido posible establecer la conexión");
        if (isset($_GET['provincias'])==false){

        }
           // header("location:localidades.php");
        else{
        

       
        $provincias= $_GET['provincias'];
        

        $consulta= "select localidades.nombre from localidades, provincias where provincias.n_provincia=localidades.n_provincia and provincias.nombre='{$provincias}';"; //solo texto
        // Hago un select de las 2 tablas, para sacar el nombre de comunidad igualo sus id y el nombre con la variable $comunidad
        $resultado=mysqli_query ($conn, $consulta); // aquí se ejecuta realmente la consulta

        $num_filas=mysqli_num_rows ($resultado);

        if($num_filas>0){
    ?>
    <form>
        <label for="localidades">Elija la localidad deseada</label>
        <select name="localidades">
            <?php
                while($fila=mysqli_fetch_assoc($resultado))
                    echo "<option value='{$fila["nombre"]}'>{$fila ["nombre"]}</option>";


            ?>
        </select>
            <button>Consultar habitantes</button> 

    </form>
            <?php
        }   

                else
                    echo "No hay datos en la tabla";
                
    }   
        
                if (isset($_GET['localidades'])==true){
                    $localidades= $_GET['localidades'];
                    $consulta2= "select localidades.poblacion from localidades where localidades.nombre='{$localidades}';";
                    $resultado=mysqli_query ($conn, $consulta2); // aquí se ejecuta realmente la consulta

                    echo $resultado;
                }
                else
                    echo "No hay ninguna localidad seleccionada";
                

            ?>
            

</body>
</html>

