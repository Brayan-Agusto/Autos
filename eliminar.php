<?php

require_once('../parqueo/conexion.php');
require_once('../parqueo/clases/parqueo.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$auto = new Parqueo($conexion, $cliente, $modelo, $fecha_entrada, $fecha_salida);
$auto->eliminarAuto($id);

header("Location : index.php");

?>