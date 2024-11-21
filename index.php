<?php

require_once('../parqueo/conexion.php');
require_once('../parqueo/clases/parqueo.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <title>Lista de Autos</title>
</head>
<body>
    <h1>Autos</h1>
    <a href="crear.php">Registrar Auto</a>
    <h2>Lista de Autos</h2>
    <?php
    $sql = "SELECT * FROM  `auto`";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0){
        while ($fila =mysqli_fetch_assoc($resultado)) {
            echo "ID: " . $fila["id"] . " - Cliente: " . $fila["cliente"] . " - Modelo: " . $fila["modelo"] . " - Entrada: " . $fila["fecha_entrada"] . " - Salida: " . $fila["fecha_salida"];
            echo " <a href='editar.php?id=" . $fila['id'] . "'>Editar</a> | ";
            echo "<a href='eliminar.php?id=" . $fila['id'] . "' onclick=\"return confirm('¿Estás seguro de eliminar este auto?')\">Eliminar</a><br>";
        }
    } else {
        echo "0 resultados";
    }
    ?>
</body>
</html>