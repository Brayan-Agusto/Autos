<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'parqueo';


$conexion = mysqli_connect($host, $username, $password, $database);

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}