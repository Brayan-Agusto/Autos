<?php

require_once('../parqueo/conexion.php');
require_once('../parqueo/clases/parqueo.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM  `auto` WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $autoData = mysqli_fetch_assoc($resultado);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $modelo = $_POST['modelo'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $fecha_salida = $_POST['fecha_salida'];

    $auto = new Parqueo($conexion, $cliente, $modelo, $fecha_entrada, $fecha_salida);
    $auto->actulizarAuto($id);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Auto</title>
</head>
<body>
    <h1>Editar Auto</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $autoData['id']?>">
        <input type="text" name="cliente" placeholder="Cliente" value="<?php echo $autoData['cliente'];?>">
        <input type="text" name="modelo" placeholder="Modelo" value="<?php echo $autoData['modelo'];?>">
        <input type="date" name="fecha_entrada" placeholder="fecha_entrada" value="<?php echo $autoData['fecha_entrada'];?>" required>
        <input type="date" name="fecha_salida" placeholder="fecha_salida" value="<?php echo $autoData['fecha_salida'];?>" required>
        <button type="button">Actualizar</button>
    </form>
</body>
</html>