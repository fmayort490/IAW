<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php include ("saludo.php");
    ?></h1>
    
    <form action="guarda_datos.php" method="get">
        <label for="nom">Nombre</label>
        <input type="text" name="nom"></input>
        <label for="edad">Edad</label>
        <input type="text" name="edad"></input>
        <input type="submit" value="Enviar"></input>

    </form>


</body>
</html>