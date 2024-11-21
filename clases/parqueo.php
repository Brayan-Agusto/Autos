<?php

require_once("/xampp/htdocs/parqueo/conexion.php");

class Parqueo{
    public $cliente, $modelo, $fecha_entrada, $fecha_salida;
    public $conexion;


    public function __construct($conexion, $cliente = null, $modelo = null, $fecha_entrada = null, $fecha_salida = null)
    {
        $this->conexion = $conexion;
        $this->cliente = $cliente;
        $this->modelo = $modelo;
        $this->fecha_entrada = $fecha_entrada;
        $this->fecha_salida = $fecha_salida;
    }

    public function registrarAuto()
    {
        $sql = "INSERT INTO auto (`cliente`, `modelo`, `fecha_entrada`, `fecha_salida`) VALUES ('$this->cliente','$this->modelo','$this->fecha_entrada','$this->fecha_salida')";
        if (mysqli_query($this->conexion, $sql)){
            echo "Auto registrado correctamente";
        } else {
            echo "Error al registrar" . mysqli_error($this->conexion);
        }
    }

    public function mostrarAuto($id)
    {
        $sql = "SELECT * FROM auto";
        $resultado = mysqli_query($this->conexion , $sql);

        if (mysqli_num_rows($resultado) > 0) {
            while($fila = mysqli_fetch_assoc($resultado)){
                echo "ID: " . $fila["id"] . " - Cliente: " . $fila["cliente"] . " - Modelo: " . $fila["modelo"] . " - Fecha_entrada: " . $fila["fecha_entrada"] . " - Fecha_salida: " . $fila["fecha_salida"] . "<br>";
            }
        } else {
            echo " 0 resultados";
        }
    }

    public function actulizarAuto($id)
    {
        $sql = "UPDATE auto SET `cliente`='$this->cliente',`modelo`='$this->modelo',`fecha_entrada`='$this->fecha_entrada',`fecha_salida`='$this->fecha_salida' WHERE id = $id";
        if (mysqli_query($this->conexion, $sql)) {
            echo "Auto autolizado";
        } else {
            echo "Error al actualizar" . mysqli_error($this->conexion);
        }
    }

    public function eliminarAuto($id)
    {
        $sql = "DELETE FROM auto WHERE id = $id";
        if (mysqli_query($this->conexion, $sql)) { 
            echo "Auto eliminado correctamente";
        } else {
            echo "Error al eliminar el estudiante: " . mysqli_error($this->conexion);
        }
    }
}