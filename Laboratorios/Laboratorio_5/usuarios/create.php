<?php
include('../conexion.php');

$nombre = $_POST['nombre'];
$carnet = $_POST['carnet'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$sql = "INSERT INTO usuarios (nombre, carnet, telefono, correo) VALUES ('$nombre', '$carnet', '$telefono', '$correo')";
$consulta = mysqli_query($link, $sql);

if (isset($consulta)) {
    echo "<div class='alert alert-success'>Usuario insertado con exito</div>";
} else {
    echo "<div class='alert alert-danger'>Error al insertar</div>";
}
mysqli_close($link);
?>