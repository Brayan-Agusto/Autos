<?php
require_once('../parqueo/conexion.php');
require_once('../parqueo/clases/parqueo.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST['cliente'];
    $modelo = $_POST['modelo'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $fecha_salida = $_POST['fecha_salida'];

    $auto = new Parqueo($conexion, $cliente, $modelo, $fecha_entrada, $fecha_salida);
    $auto->registrarAuto();

} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Auto</title>
</head>
<body>
    <h1>Registrar Auto</h1>
    <form method="post">
        <input type="text" name="cliente" placeholder="Cliente" required>
        <input type="text" name="modelo" placeholder="Modelo" required>
        <input type="date" name="fecha_entrada" placeholder="Fecha_entrada" required>
        <input type="date" name="fecha_salida" placeholder="Fecha_salida" required>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>